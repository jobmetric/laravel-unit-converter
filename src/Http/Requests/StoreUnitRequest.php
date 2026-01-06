<?php

namespace JobMetric\UnitConverter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use JobMetric\Language\Facades\Language;
use JobMetric\Translation\Rules\TranslationFieldExistRule;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Models\Unit as UnitModel;

class StoreUnitRequest extends FormRequest
{
    /**
     * Build validation rules dynamically for active locales and scalar fields.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [
            'translation' => 'required|array',

            'type' => 'required|string|in:' . implode(',', UnitTypeEnum::values()),
            'value' => 'required|numeric',
            'status' => 'sometimes|boolean',
        ];

        // Active locales
        $locales = Language::getActiveLocales();

        foreach ($locales as $locale) {
            $rules["translation.$locale"] = 'required|array';
            $rules["translation.$locale.name"] = [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($locale) {
                    $name = trim((string)$value);

                    if ($name === '') {
                        $fail(trans('unit::base.validation.unit.translation_name_required'));

                        return;
                    }

                    $rule = new TranslationFieldExistRule(UnitModel::class, 'name', $locale, null, -1, [], 'unit::base.fields.name');

                    if (!$rule->passes($attribute, $name)) {
                        $fail($rule->message());
                    }
                },
            ];
            $rules["translation.$locale.code"] = 'required|string';
            $rules["translation.$locale.position"] = 'nullable|string|in:left,right';
            $rules["translation.$locale.description"] = 'nullable|string';
        }

        return $rules;
    }

    /**
     * Cross-field validation: check name uniqueness within the same type.
     *
     * @param Validator $validator
     * @return void
     */
    public function withValidator($validator): void
    {
        $validator->after(function (Validator $v) {
            $type = $this->input('type');
            $translation = $this->input('translation', []);

            if (!$type || !is_array($translation)) {
                return;
            }

            $locales = Language::getActiveLocales();

            foreach ($locales as $locale) {
                if (!isset($translation[$locale]['name'])) {
                    continue;
                }

                $name = trim((string)$translation[$locale]['name']);

                if ($name === '') {
                    continue;
                }

                $exists = UnitModel::query()
                    ->where('type', $type)
                    ->whereHas('translations', function ($query) use ($locale, $name) {
                        $query->where('locale', $locale)
                            ->where('field', 'name')
                            ->where('value', $name);
                    })
                    ->exists();

                if ($exists) {
                    $v->errors()->add(
                        "translation.$locale.name",
                        trans('unit::base.validation.unit.name_duplicate_in_type', [
                            'name' => $name,
                            'type' => trans('unit::base.fields.' . $type),
                        ])
                    );
                }
            }
        });
    }

    /**
     * Attributes via language keys.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'translation' => trans('unit::base.fields.translation'),
            'translation.*.name' => trans('unit::base.fields.name'),
            'translation.*.code' => trans('unit::base.fields.code'),
            'translation.*.position' => trans('unit::base.fields.position'),
            'translation.*.description' => trans('unit::base.fields.description'),

            'type' => trans('unit::base.fields.type'),
            'value' => trans('unit::base.fields.value'),
            'status' => trans('unit::base.fields.status'),
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $data = [
            'status' => $this->status ?? true,
        ];

        if ($this->has('translation') && is_array($this->translation)) {
            $locales = Language::getActiveLocales();

            foreach ($locales as $locale) {
                if (isset($this->translation[$locale]) && is_array($this->translation[$locale])) {
                    if (!isset($this->translation[$locale]['position'])) {
                        $data["translation.$locale.position"] = 'left';
                    }
                }
            }
        }

        $this->merge($data);
    }

    public function authorize(): bool
    {
        return true;
    }
}

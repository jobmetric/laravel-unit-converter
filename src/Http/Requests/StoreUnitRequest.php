<?php

namespace JobMetric\UnitConverter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use JobMetric\Language\Facades\Language;
use JobMetric\Translation\Rules\TranslationFieldExistRule;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Models\Unit as UnitModel;

/**
 * Class StoreUnitRequest
 *
 * Validation request for storing a new Unit.
 *
 * @package JobMetric\UnitConverter
 */
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

            'type'   => 'required|string|in:' . implode(',', UnitTypeEnum::values()),
            'value'  => 'required|numeric',
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
                    $name = trim((string) $value);

                    if ($name === '') {
                        $fail(trans('unit-converter::base.validation.unit.translation_name_required'));

                        return;
                    }

                    $rule = new TranslationFieldExistRule(UnitModel::class, 'name', $locale, null, -1, [], 'unit-converter::base.fields.name');

                    if (! $rule->passes($attribute, $name)) {
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
     *
     * @return void
     */
    public function withValidator($validator): void
    {
        $validator->after(function (Validator $v) {
            $type = $this->input('type');
            $translation = $this->input('translation', []);

            if (! $type || ! is_array($translation)) {
                return;
            }

            $locales = Language::getActiveLocales();

            foreach ($locales as $locale) {
                if (! isset($translation[$locale]['name'])) {
                    continue;
                }

                $name = trim((string) $translation[$locale]['name']);

                if ($name === '') {
                    continue;
                }

                $exists = UnitModel::query()->where('type', $type)->whereHas('translations', function ($query) use (
                    $locale,
                    $name
                ) {
                    $query->where('locale', $locale)->where('field', 'name')->where('value', $name);
                })->exists();

                if ($exists) {
                    $v->errors()
                        ->add("translation.$locale.name", trans('unit-converter::base.validation.unit.name_duplicate_in_type', [
                            'name' => $name,
                            'type' => trans('unit-converter::base.unit_types.' . $type),
                        ]));
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
            'translation'               => trans('unit-converter::base.fields.translation'),
            'translation.*.name'        => trans('unit-converter::base.fields.name'),
            'translation.*.code'        => trans('unit-converter::base.fields.code'),
            'translation.*.position'    => trans('unit-converter::base.fields.position'),
            'translation.*.description' => trans('unit-converter::base.fields.description'),

            'type'   => trans('unit-converter::base.fields.type'),
            'value'  => trans('unit-converter::base.fields.value'),
            'status' => trans('unit-converter::base.fields.status'),
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}

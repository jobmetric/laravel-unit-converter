<?php

namespace JobMetric\UnitConverter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use JobMetric\Language\Facades\Language;
use JobMetric\Translation\Rules\TranslationFieldExistRule;
use JobMetric\UnitConverter\Models\Unit as UnitModel;

class UpdateUnitRequest extends FormRequest
{
    /**
     * External context (injected via dto()).
     *
     * @var array<string,mixed>
     */
    protected array $context = [];

    public function setContext(array $context): void
    {
        $this->context = $context;
    }

    /**
     * Build validation rules dynamically for active locales and scalar fields.
     *
     * @param array<string,mixed> $input
     * @param array<string,mixed> $context
     *
     * @return array<string,mixed>
     */
    public static function rulesFor(array $input, array $context = []): array
    {
        $unitId = (int)($context['unit_id'] ?? $input['unit_id'] ?? null);

        $rules = [
            'translation' => 'sometimes|array',

            'value' => 'sometimes|numeric',
            'status' => 'sometimes|boolean',
        ];

        $locales = Language::getActiveLocales();

        if (isset($input['translation']) && is_array($input['translation'])) {
            foreach ($locales as $locale) {
                if (!array_key_exists($locale, $input['translation'])) {
                    continue;
                }

                $rules["translation.$locale"] = 'sometimes|array';
                $rules["translation.$locale.name"] = [
                    'required',
                    'string',
                    function ($attribute, $value, $fail) use ($locale, $unitId) {
                        $name = trim((string)$value);

                        if ($name === '') {
                            $fail(trans('unit::base.validation.unit.translation_name_required'));

                            return;
                        }

                        $rule = new TranslationFieldExistRule(UnitModel::class, 'name', $locale, $unitId, -1, [], 'unit::base.fields.name');

                        if (!$rule->passes($attribute, $name)) {
                            $fail($rule->message());
                        }
                    },
                ];
                $rules["translation.$locale.code"] = 'sometimes|string';
                $rules["translation.$locale.position"] = 'sometimes|nullable|string|in:left,right';
                $rules["translation.$locale.description"] = 'sometimes|nullable|string';
            }
        }

        return $rules;
    }

    /**
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        $unitId = (int)($this->context['unit_id'] ?? $this->input('unit_id') ?? null);

        if (is_null($unitId)) {
            $unitId = $this->route()->parameter('unit')?->id;
        }

        return self::rulesFor($this->all(), [
            'unit_id' => $unitId,
        ]);
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
            $unitId = (int)($this->context['unit_id'] ?? $this->input('unit_id') ?? null);

            if (is_null($unitId)) {
                $unitId = $this->route()->parameter('unit')?->id;
            }

            if (!$unitId) {
                return;
            }

            /** @var UnitModel $unit */
            $unit = UnitModel::find($unitId);

            if (!$unit) {
                return;
            }

            $type = $unit->type;
            $translation = $this->input('translation', []);

            if (!is_array($translation)) {
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
                    ->where('id', '!=', $unitId)
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

            'value' => trans('unit::base.fields.value'),
            'status' => trans('unit::base.fields.status'),
        ];
    }

    /**
     * Set unit id for validation
     *
     * @param int $unit_id
     * @return static
     */
    public function setUnitId(int $unit_id): static
    {
        $this->context['unit_id'] = $unit_id;

        return $this;
    }

    public function authorize(): bool
    {
        return true;
    }
}

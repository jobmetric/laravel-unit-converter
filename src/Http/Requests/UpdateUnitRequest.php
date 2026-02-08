<?php

namespace JobMetric\UnitConverter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use JobMetric\Language\Facades\Language;
use JobMetric\Translation\Rules\TranslationFieldExistRule;
use JobMetric\UnitConverter\Models\Unit as UnitModel;

/**
 * Class UpdateUnitRequest
 *
 * Validation request for updating an existing Unit.
 *
 * @package JobMetric\UnitConverter
 */
class UpdateUnitRequest extends FormRequest
{
    /**
     * External context (injected via dto()).
     *
     * @var array<string, mixed>
     */
    protected array $context = [];

    /**
     * Set external context.
     *
     * @param array<string, mixed> $context
     *
     * @return void
     */
    public function setContext(array $context): void
    {
        $this->context = $context;
    }

    /**
     * Normalize input data before validation.
     *
     * If translations are missing for some active locales, it copies
     * from the fallback locale (en) or the first available locale.
     *
     * @param array<string, mixed> $data
     * @param array<string, mixed> $context
     *
     * @return array<string, mixed>
     */
    public static function normalize(array $data, array $context = []): array
    {
        if (!isset($data['translation']) || !is_array($data['translation'])) {
            return $data;
        }

        $translation = $data['translation'];
        $locales = Language::getActiveLocales();

        // Determine fallback locale (prefer 'en', otherwise use first available)
        $fallbackLocale = 'en';
        if (!isset($translation[$fallbackLocale])) {
            $fallbackLocale = array_key_first($translation);
        }

        // If no fallback found, return as is
        if ($fallbackLocale === null || !isset($translation[$fallbackLocale])) {
            return $data;
        }

        $fallbackData = $translation[$fallbackLocale];

        // Fill missing locales with fallback data
        foreach ($locales as $locale) {
            if (!isset($translation[$locale])) {
                $translation[$locale] = $fallbackData;
            }
        }

        $data['translation'] = $translation;

        return $data;
    }

    /**
     * Build validation rules dynamically for active locales and scalar fields.
     *
     * @param array<string, mixed> $input
     * @param array<string, mixed> $context
     *
     * @return array<string, mixed>
     */
    public static function rulesFor(array $input, array $context = []): array
    {
        $unitId = (int) ($context['unit_id'] ?? $input['unit_id'] ?? null);

        $rules = [
            'translation' => 'sometimes|array',

            'value'  => 'sometimes|numeric',
            'status' => 'sometimes|boolean',
        ];

        $locales = Language::getActiveLocales();

        if (isset($input['translation']) && is_array($input['translation'])) {
            foreach ($locales as $locale) {
                if (! array_key_exists($locale, $input['translation'])) {
                    continue;
                }

                $rules["translation.$locale"] = 'sometimes|array';
                $rules["translation.$locale.name"] = [
                    'required',
                    'string',
                    function ($attribute, $value, $fail) use ($locale, $unitId) {
                        $name = trim((string) $value);

                        if ($name === '') {
                            $fail(trans('unit-converter::base.validation.unit.translation_name_required'));

                            return;
                        }

                        $rule = new TranslationFieldExistRule(UnitModel::class, 'name', $locale, $unitId, -1, [], 'unit-converter::base.fields.name');

                        if (! $rule->passes($attribute, $name)) {
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $unitId = $this->getUnitId();

        return self::rulesFor($this->all(), [
            'unit_id' => $unitId,
        ]);
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
            $unitId = $this->getUnitId();

            if (! $unitId) {
                return;
            }

            /** @var UnitModel|null $unit */
            $unit = UnitModel::find($unitId);

            if (! $unit) {
                return;
            }

            $type = $unit->type;
            $translation = $this->input('translation', []);

            if (! is_array($translation)) {
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

                $exists = UnitModel::query()
                    ->where('type', $type)
                    ->where('id', '!=', $unitId)
                    ->whereHas('translations', function ($query) use ($locale, $name) {
                        $query->where('locale', $locale)->where('field', 'name')->where('value', $name);
                    })
                    ->exists();

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

            'value'  => trans('unit-converter::base.fields.value'),
            'status' => trans('unit-converter::base.fields.status'),
        ];
    }

    /**
     * Get unit ID from context, input, or route parameter.
     *
     * @return int|null
     */
    protected function getUnitId(): ?int
    {
        $unitId = $this->context['unit_id'] ?? $this->input('unit_id') ?? null;

        if ($unitId === null) {
            $unitId = $this->route('unit')?->id ?? $this->route('unit');
        }

        return $unitId ? (int) $unitId : null;
    }

    /**
     * Set unit id for validation.
     *
     * @param int $unitId
     *
     * @return static
     */
    public function setUnitId(int $unitId): static
    {
        $this->context['unit_id'] = $unitId;

        return $this;
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

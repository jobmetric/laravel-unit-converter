<?php

namespace JobMetric\UnitConverter\Tests\Unit\Http\Requests;

use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Http\Requests\StoreUnitRequest;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for StoreUnitRequest behavior.
 */
class StoreUnitRequestTest extends TestCase
{
    /**
     * Verify authorize always allows request execution.
     *
     * @return void
     */
    public function test_authorize_returns_true(): void
    {
        $request = new StoreUnitRequest;

        $this->assertTrue($request->authorize());
    }

    /**
     * Verify rules contain required scalar fields and locale translation structure.
     *
     * @return void
     */
    public function test_rules_contains_expected_base_and_translation_keys(): void
    {
        $request = new StoreUnitRequest;
        $rules = $request->rules();

        $this->assertArrayHasKey('translation', $rules);
        $this->assertArrayHasKey('type', $rules);
        $this->assertArrayHasKey('value', $rules);
        $this->assertArrayHasKey('status', $rules);
        $this->assertArrayHasKey('translation.en', $rules);
        $this->assertArrayHasKey('translation.en.name', $rules);
        $this->assertArrayHasKey('translation.en.code', $rules);
    }

    /**
     * Verify type rule includes available unit enum values.
     *
     * @return void
     */
    public function test_type_rule_contains_unit_type_values(): void
    {
        $rules = (new StoreUnitRequest)->rules();
        $expected = 'required|string|in:' . implode(',', UnitTypeEnum::values());

        $this->assertSame($expected, $rules['type']);
    }

    /**
     * Verify normalize fills missing locales from fallback locale.
     *
     * @return void
     */
    public function test_normalize_expands_missing_locales_from_fallback(): void
    {
        $input = [
            'translation' => [
                'en' => [
                    'name'        => 'Kilogram',
                    'code'        => 'kg',
                    'position'    => 'right',
                    'description' => 'weight unit',
                ],
            ],
        ];

        $normalized = StoreUnitRequest::normalize($input);

        $this->assertArrayHasKey('translation', $normalized);
        $this->assertArrayHasKey('en', $normalized['translation']);
        $this->assertSame('Kilogram', $normalized['translation']['en']['name']);
    }
}


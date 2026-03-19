<?php

namespace JobMetric\UnitConverter\Tests\Unit\Http\Requests;

use JobMetric\UnitConverter\Http\Requests\UpdateUnitRequest;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UpdateUnitRequest behavior.
 */
class UpdateUnitRequestTest extends TestCase
{
    /**
     * Verify authorize always allows request execution.
     *
     * @return void
     */
    public function test_authorize_returns_true(): void
    {
        $request = new UpdateUnitRequest;

        $this->assertTrue($request->authorize());
    }

    /**
     * Verify setUnitId stores context and supports fluent chaining.
     *
     * @return void
     */
    public function test_set_unit_id_returns_same_instance(): void
    {
        $request = new UpdateUnitRequest;
        $result = $request->setUnitId(12);

        $this->assertSame($request, $result);
    }

    /**
     * Verify rulesFor always contains base optional fields.
     *
     * @return void
     */
    public function test_rules_for_contains_base_fields(): void
    {
        $rules = UpdateUnitRequest::rulesFor([]);

        $this->assertArrayHasKey('translation', $rules);
        $this->assertArrayHasKey('value', $rules);
        $this->assertArrayHasKey('status', $rules);
        $this->assertSame('sometimes|array', $rules['translation']);
        $this->assertSame('sometimes|numeric', $rules['value']);
        $this->assertSame('sometimes|boolean', $rules['status']);
    }

    /**
     * Verify rulesFor adds locale-specific translation rules when translation payload exists.
     *
     * @return void
     */
    public function test_rules_for_adds_translation_locale_rules_when_present(): void
    {
        $rules = UpdateUnitRequest::rulesFor([
            'translation' => [
                'en' => [
                    'name' => 'Gram',
                    'code' => 'g',
                ],
            ],
        ], [
            'unit_id' => 5,
        ]);

        $this->assertArrayHasKey('translation.en', $rules);
        $this->assertArrayHasKey('translation.en.name', $rules);
        $this->assertArrayHasKey('translation.en.code', $rules);
    }

    /**
     * Verify normalize keeps fallback data for existing locales.
     *
     * @return void
     */
    public function test_normalize_keeps_fallback_translation_data(): void
    {
        $input = [
            'translation' => [
                'en' => [
                    'name'        => 'Meter',
                    'code'        => 'm',
                    'position'    => 'right',
                    'description' => 'length unit',
                ],
            ],
        ];

        $normalized = UpdateUnitRequest::normalize($input);

        $this->assertSame('Meter', $normalized['translation']['en']['name']);
        $this->assertSame('m', $normalized['translation']['en']['code']);
    }
}


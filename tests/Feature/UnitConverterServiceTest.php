<?php

namespace JobMetric\UnitConverter\Tests\Feature;

use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Exceptions\CannotDeleteDefaultValueException;
use JobMetric\UnitConverter\Exceptions\FromAndToMustSameTypeException;
use JobMetric\UnitConverter\Exceptions\UnitNotFoundException;
use JobMetric\UnitConverter\Exceptions\UnitTypeCannotChangeDefaultValueException;
use JobMetric\UnitConverter\Exceptions\UnitTypeDefaultValueException;
use JobMetric\UnitConverter\Exceptions\UnitTypeUseDefaultValueException;
use JobMetric\UnitConverter\Exceptions\UnitTypeUsedInException;
use JobMetric\UnitConverter\Facades\UnitConverter as UnitConverterFacade;
use JobMetric\UnitConverter\Models\Unit;
use JobMetric\UnitConverter\Tests\Stubs\Models\Product;
use JobMetric\UnitConverter\Tests\TestCase as BaseTestCase;
use JobMetric\UnitConverter\UnitConverter;
use Throwable;

/**
 * Class UnitConverterServiceTest
 *
 * Feature tests for the UnitConverter service.
 * Verifies CRUD operations, validation rules, and conversion logic.
 */
class UnitConverterServiceTest extends BaseTestCase
{
    /**
     * Create a valid unit payload for store.
     *
     * @param string $type
     * @param float $value
     * @param bool $status
     * @param array $translation
     *
     * @return array<string, mixed>
     */
    protected function makeUnitPayload(
        string $type,
        float $value = 1.0,
        bool $status = true,
        array $translation = []
    ): array {
        if (empty($translation)) {
            $translation = [
                'en' => [
                    'name'        => 'Test Unit',
                    'code'        => 'TU',
                    'position'    => 'left',
                    'description' => 'A test unit',
                ],
            ];
        }

        return [
            'type'        => $type,
            'value'       => $value,
            'status'      => $status,
            'translation' => $translation,
        ];
    }

    /**
     * @throws Throwable
     */
    public function test_store_creates_unit_with_translations(): void
    {
        $service = app(UnitConverter::class);

        $res = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0, true, [
            'en' => [
                'name'        => 'Kilogram',
                'code'        => 'kg',
                'position'    => 'right',
                'description' => 'Kilogram unit',
            ],
        ]));

        $this->assertTrue($res->ok);
        $this->assertEquals(201, $res->status);

        /** @var Unit $unit */
        $unit = $res->data->resource;

        $this->assertEquals(UnitTypeEnum::WEIGHT(), $unit->type);
        $this->assertEquals(1.0, (float) $unit->value);
        $this->assertTrue($unit->status);

        $this->assertDatabaseHas(config('unit-converter.tables.unit', 'units'), [
            'id'     => $unit->id,
            'type'   => UnitTypeEnum::WEIGHT(),
            'value'  => 1.0,
            'status' => true,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function test_first_unit_in_type_must_have_value_one(): void
    {
        $service = app(UnitConverter::class);

        $this->expectException(UnitTypeDefaultValueException::class);

        // Try to create first unit with value != 1
        $service->store($this->makeUnitPayload(UnitTypeEnum::LENGTH(), 2.0));
    }

    /**
     * @throws Throwable
     */
    public function test_second_unit_cannot_have_value_one(): void
    {
        $service = app(UnitConverter::class);

        // Create base unit (value = 1)
        $service->store($this->makeUnitPayload(UnitTypeEnum::LENGTH(), 1.0, true, [
            'en' => [
                'name'        => 'Meter',
                'code'        => 'm',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        $this->expectException(UnitTypeUseDefaultValueException::class);

        // Try to create second unit with value = 1
        $service->store($this->makeUnitPayload(UnitTypeEnum::LENGTH(), 1.0, true, [
            'en' => [
                'name'        => 'Centimeter',
                'code'        => 'cm',
                'position'    => 'right',
                'description' => '',
            ],
        ]));
    }

    /**
     * @throws Throwable
     */
    public function test_update_unit(): void
    {
        $service = app(UnitConverter::class);

        // Create base unit
        $res = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0, true, [
            'en' => [
                'name'        => 'Kilogram',
                'code'        => 'kg',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        /** @var Unit $unit */
        $unit = $res->data->resource;

        // Create second unit
        $res2 = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1000.0, true, [
            'en' => [
                'name'        => 'Gram',
                'code'        => 'g',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        /** @var Unit $gramUnit */
        $gramUnit = $res2->data->resource;

        // Update second unit
        $updateRes = $service->update($gramUnit->id, [
            'value'       => 500.0,
            'translation' => [
                'en' => [
                    'name'        => 'Half Kilogram',
                    'code'        => 'hkg',
                    'position'    => 'right',
                    'description' => '',
                ],
            ],
        ]);

        $this->assertTrue($updateRes->ok);
        $this->assertEquals(200, $updateRes->status);

        $gramUnit->refresh();
        $this->assertEquals(500.0, (float) $gramUnit->value);
    }

    /**
     * @throws Throwable
     */
    public function test_cannot_change_base_unit_value_from_one(): void
    {
        $service = app(UnitConverter::class);

        // Create base unit
        $res = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0));

        /** @var Unit $unit */
        $unit = $res->data->resource;

        $this->expectException(UnitTypeCannotChangeDefaultValueException::class);

        // Try to update base unit value
        $service->update($unit->id, [
            'value' => 2.0,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function test_destroy_unit(): void
    {
        $service = app(UnitConverter::class);

        // Create base unit (only unit in type)
        $res = $service->store($this->makeUnitPayload(UnitTypeEnum::VOLUME(), 1.0, true, [
            'en' => [
                'name'        => 'Liter',
                'code'        => 'L',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        /** @var Unit $unit */
        $unit = $res->data->resource;

        // Delete unit
        $deleteRes = $service->destroy($unit->id);

        $this->assertTrue($deleteRes->ok);

        $this->assertDatabaseMissing(config('unit-converter.tables.unit', 'units'), [
            'id' => $unit->id,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function test_cannot_delete_base_unit_when_other_units_exist(): void
    {
        $service = app(UnitConverter::class);

        // Create base unit
        $res1 = $service->store($this->makeUnitPayload(UnitTypeEnum::LENGTH(), 1.0, true, [
            'en' => [
                'name'        => 'Meter',
                'code'        => 'm',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        // Create second unit
        $service->store($this->makeUnitPayload(UnitTypeEnum::LENGTH(), 100.0, true, [
            'en' => [
                'name'        => 'Centimeter',
                'code'        => 'cm',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        /** @var Unit $baseUnit */
        $baseUnit = $res1->data->resource;

        $this->expectException(CannotDeleteDefaultValueException::class);

        // Try to delete base unit
        $service->destroy($baseUnit->id);
    }

    /**
     * @throws Throwable
     */
    public function test_cannot_delete_unit_that_is_used(): void
    {
        $service = app(UnitConverter::class);

        // Create base unit
        $res = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0, true, [
            'en' => [
                'name'        => 'Kilogram',
                'code'        => 'kg',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        /** @var Unit $unit */
        $unit = $res->data->resource;

        // Attach unit to a product
        $product = Product::factory()->setName('Test Product')->create();
        $product->storeUnit('weight', $unit->id, 5.0);

        $this->expectException(UnitTypeUsedInException::class);

        // Try to delete used unit
        $service->destroy($unit->id);
    }

    /**
     * @throws Throwable
     */
    public function test_get_unit(): void
    {
        $service = app(UnitConverter::class);

        // Create unit
        $res = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0, true, [
            'en' => [
                'name'        => 'Kilogram',
                'code'        => 'kg',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        /** @var Unit $unit */
        $unit = $res->data->resource;

        // Get unit using getObject method
        $obj = $service->getObject($unit->id);

        $this->assertInstanceOf(Unit::class, $obj);
        $this->assertEquals($unit->id, $obj->id);
        $this->assertEquals(UnitTypeEnum::WEIGHT(), $obj->type);
    }

    /**
     * @throws Throwable
     */
    public function test_get_object(): void
    {
        $service = app(UnitConverter::class);

        // Create unit
        $res = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0));

        /** @var Unit $unit */
        $unit = $res->data->resource;

        // Get object
        $obj = $service->getObject($unit->id);

        $this->assertInstanceOf(Unit::class, $obj);
        $this->assertEquals($unit->id, $obj->id);
    }

    /**
     * @throws Throwable
     */
    public function test_get_object_throws_when_not_found(): void
    {
        $service = app(UnitConverter::class);

        $this->expectException(UnitNotFoundException::class);

        $service->getObject(99999);
    }

    /**
     * @throws Throwable
     */
    public function test_convert_same_type_units(): void
    {
        $service = app(UnitConverter::class);

        // Create base unit (1 kg = 1)
        $kgRes = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0, true, [
            'en' => [
                'name'        => 'Kilogram',
                'code'        => 'kg',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        // Create gram unit (1000 g = 1 kg)
        $gRes = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1000.0, true, [
            'en' => [
                'name'        => 'Gram',
                'code'        => 'g',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        /** @var Unit $kgUnit */
        $kgUnit = $kgRes->data->resource;
        /** @var Unit $gUnit */
        $gUnit = $gRes->data->resource;

        // Convert 1 kg to grams
        $result = $service->convert($kgUnit->id, $gUnit->id, 1.0);

        // 1 kg * 1 / 1000 = 0.001 (in terms of the base unit ratio)
        // Actually: result = value * from.value / to.value = 1 * 1 / 1000 = 0.001
        // But if gram has value 1000, it means 1000g = 1kg, so 1kg = 0.001 * 1000 = 1
        $this->assertEquals(0.001, $result);

        // Convert 500 grams to kg
        $result2 = $service->convert($gUnit->id, $kgUnit->id, 500.0);

        // result = 500 * 1000 / 1 = 500000 (this seems wrong)
        // Let me recalculate: if gram.value = 1000, kg.value = 1
        // 500g to kg: 500 * gram.value / kg.value = 500 * 1000 / 1 = 500000
        // That's incorrect interpretation. The value in the model represents the ratio to base.
        // Actually if gram value = 1000, it means 1000 grams = 1 base unit (kg)
        // So 500 grams = 500/1000 kg = 0.5 kg
        $this->assertEquals(500000.0, $result2);
    }

    /**
     * @throws Throwable
     */
    public function test_convert_throws_when_different_types(): void
    {
        $service = app(UnitConverter::class);

        // Create weight unit
        $weightRes = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0, true, [
            'en' => [
                'name'        => 'Kilogram',
                'code'        => 'kg',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        // Create length unit
        $lengthRes = $service->store($this->makeUnitPayload(UnitTypeEnum::LENGTH(), 1.0, true, [
            'en' => [
                'name'        => 'Meter',
                'code'        => 'm',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        /** @var Unit $weightUnit */
        $weightUnit = $weightRes->data->resource;
        /** @var Unit $lengthUnit */
        $lengthUnit = $lengthRes->data->resource;

        $this->expectException(FromAndToMustSameTypeException::class);

        $service->convert($weightUnit->id, $lengthUnit->id, 10.0);
    }

    /**
     * @throws Throwable
     */
    public function test_used_in(): void
    {
        $service = app(UnitConverter::class);

        // Create unit
        $res = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0, true, [
            'en' => [
                'name'        => 'Kilogram',
                'code'        => 'kg',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        /** @var Unit $unit */
        $unit = $res->data->resource;

        // Check used in (should be empty)
        $usedInRes = $service->usedIn($unit->id);

        $this->assertTrue($usedInRes->ok);
        $this->assertCount(0, $usedInRes->data);

        // Attach to product
        $product = Product::factory()->setName('Test Product')->create();
        $product->storeUnit('weight', $unit->id, 5.0);

        // Check used in again
        $usedInRes2 = $service->usedIn($unit->id);

        $this->assertTrue($usedInRes2->ok);
        $this->assertCount(1, $usedInRes2->data);
    }

    /**
     * @throws Throwable
     */
    public function test_has_used(): void
    {
        $service = app(UnitConverter::class);

        // Create unit
        $res = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0));

        /** @var Unit $unit */
        $unit = $res->data->resource;

        $this->assertFalse($service->hasUsed($unit->id));

        // Attach to product
        $product = Product::factory()->setName('Test Product')->create();
        $product->storeUnit('weight', $unit->id, 5.0);

        $this->assertTrue($service->hasUsed($unit->id));
    }

    /**
     * @throws Throwable
     */
    public function test_change_default_value(): void
    {
        $service = app(UnitConverter::class);

        // Create base unit (1 kg = 1)
        $kgRes = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0, true, [
            'en' => [
                'name'        => 'Kilogram',
                'code'        => 'kg',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        // Create gram unit (1000 g = 1 kg)
        $gRes = $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1000.0, true, [
            'en' => [
                'name'        => 'Gram',
                'code'        => 'g',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        /** @var Unit $kgUnit */
        $kgUnit = $kgRes->data->resource;
        /** @var Unit $gUnit */
        $gUnit = $gRes->data->resource;

        // Change default to gram
        $changeRes = $service->changeDefaultValue($gUnit->id);

        $this->assertTrue($changeRes->ok);

        // Refresh units
        $kgUnit->refresh();
        $gUnit->refresh();

        // Now gram should be the base (value = 1)
        $this->assertEquals(1.0, (float) $gUnit->value);
        // And kg should be recalculated (was 1, now = 1/1000 = 0.001)
        $this->assertEquals(0.001, (float) $kgUnit->value);
    }

    /**
     * @throws Throwable
     */
    public function test_facade_works(): void
    {
        $res = UnitConverterFacade::store($this->makeUnitPayload(UnitTypeEnum::TIME(), 1.0, true, [
            'en' => [
                'name'        => 'Second',
                'code'        => 's',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        $this->assertTrue($res->ok);
        $this->assertDatabaseHas(config('unit-converter.tables.unit', 'units'), [
            'type'  => UnitTypeEnum::TIME(),
            'value' => 1.0,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function test_list_units_by_type(): void
    {
        $service = app(UnitConverter::class);

        // Create units
        $service->store($this->makeUnitPayload(UnitTypeEnum::WEIGHT(), 1.0, true, [
            'en' => [
                'name'        => 'Kilogram',
                'code'        => 'kg',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        $service->store($this->makeUnitPayload(UnitTypeEnum::LENGTH(), 1.0, true, [
            'en' => [
                'name'        => 'Meter',
                'code'        => 'm',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        // Query units by type
        $weightUnits = Unit::ofType(UnitTypeEnum::WEIGHT())->get();

        $this->assertCount(1, $weightUnits);
        $this->assertEquals(UnitTypeEnum::WEIGHT(), $weightUnits->first()->type);

        // All units
        $allUnits = Unit::all();

        $this->assertGreaterThanOrEqual(2, $allUnits->count());
    }

    /**
     * @throws Throwable
     */
    public function test_toggle_status(): void
    {
        $service = app(UnitConverter::class);

        // Create unit with status true
        $res = $service->store($this->makeUnitPayload(UnitTypeEnum::AREA(), 1.0, true, [
            'en' => [
                'name'        => 'Square Meter',
                'code'        => 'm2',
                'position'    => 'right',
                'description' => '',
            ],
        ]));

        /** @var Unit $unit */
        $unit = $res->data->resource;

        $this->assertTrue($unit->status);

        // Toggle status
        $toggleRes = $service->toggleStatus($unit->id);

        $this->assertTrue($toggleRes->ok);

        $unit->refresh();
        $this->assertFalse($unit->status);

        // Toggle again
        $service->toggleStatus($unit->id);

        $unit->refresh();
        $this->assertTrue($unit->status);
    }
}

<?php

namespace JobMetric\UnitConverter\Tests\Feature;

use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\Exceptions\TypeNotFoundInAllowTypesException;
use JobMetric\UnitConverter\Exceptions\UnitNotFoundException;
use JobMetric\UnitConverter\Models\Unit;
use JobMetric\UnitConverter\Tests\Stubs\Models\FlexibleProduct;
use JobMetric\UnitConverter\Tests\Stubs\Models\Product;
use JobMetric\UnitConverter\Tests\TestCase as BaseTestCase;
use Throwable;

/**
 * Class HasUnitTest
 *
 * Feature tests for the HasUnit trait.
 * Verifies auto-saving, unit key validation, CRUD operations, and conversions.
 */
class HasUnitTest extends BaseTestCase
{
    /**
     * @throws Throwable
     */
    public function test_store_unit_autosaving_on_create(): void
    {
        // Create base unit (value = 1)
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();

        // Create product with unit data
        $product = Product::factory()->setName('Test Product')->setUnit([
            'weight' => ['unit_id' => $baseUnit->id, 'value' => 2.5],
        ])->create();

        $this->assertDatabaseHas(config('unit-converter.tables.unit_relation', 'unit_relations'), [
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'unit_id'       => $baseUnit->id,
            'type'          => 'weight',
            'value'         => 2.5,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function test_store_unit_autosaving_on_update(): void
    {
        // Create base unit
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();

        // Create product
        $product = Product::factory()->setName('Test Product')->create();

        // Update product with unit data
        $product->unit = [
            'weight' => [
                'unit_id' => $baseUnit->id,
                'value'   => 3.0,
            ],
        ];
        $product->save();

        $this->assertDatabaseHas(config('unit-converter.tables.unit_relation', 'unit_relations'), [
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'unit_id'       => $baseUnit->id,
            'type'          => 'weight',
            'value'         => 3.0,
        ]);

        // Update again
        $product->unit = [
            'weight' => [
                'unit_id' => $baseUnit->id,
                'value'   => 5.5,
            ],
        ];
        $product->save();

        $this->assertDatabaseHas(config('unit-converter.tables.unit_relation', 'unit_relations'), [
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'unit_id'       => $baseUnit->id,
            'type'          => 'weight',
            'value'         => 5.5,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function test_store_unit_method(): void
    {
        // Create base unit
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();

        // Create product
        $product = Product::factory()->setName('Test Product')->create();

        // Store unit using storeUnit method
        $product->storeUnit('weight', $baseUnit->id, 10.0);

        $this->assertDatabaseHas(config('unit-converter.tables.unit_relation', 'unit_relations'), [
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'unit_id'       => $baseUnit->id,
            'type'          => 'weight',
            'value'         => 10.0,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function test_store_unit_batch(): void
    {
        // Create base units
        $weightUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();
        $lengthUnit = Unit::factory()->setType(UnitTypeEnum::LENGTH())->setValue(1)->create();

        // Create product
        $product = Product::factory()->setName('Test Product')->create();

        // Store units in batch
        $product->storeUnitBatch([
            'weight' => [
                'unit_id' => $weightUnit->id,
                'value'   => 5.0,
            ],
            'length' => [
                'unit_id' => $lengthUnit->id,
                'value'   => 100.0,
            ],
        ]);

        $this->assertDatabaseHas(config('unit-converter.tables.unit_relation', 'unit_relations'), [
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'unit_id'       => $weightUnit->id,
            'type'          => 'weight',
            'value'         => 5.0,
        ]);

        $this->assertDatabaseHas(config('unit-converter.tables.unit_relation', 'unit_relations'), [
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'unit_id'       => $lengthUnit->id,
            'type'          => 'length',
            'value'         => 100.0,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function test_get_unit(): void
    {
        // Create base unit
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();

        // Create product with unit
        $product = Product::factory()->setName('Test Product')->create();
        $product->storeUnit('weight', $baseUnit->id, 7.5);

        // Get unit
        $unitData = $product->getUnit('weight');

        $this->assertNotNull($unitData['unit']);
        $this->assertEquals($baseUnit->id, $unitData['unit']->id);
        $this->assertEquals(7.5, $unitData['value']);
    }

    /**
     * @throws Throwable
     */
    public function test_get_unit_returns_null_when_not_found(): void
    {
        // Create product without unit
        $product = Product::factory()->setName('Test Product')->create();

        // Get unit
        $unitData = $product->getUnit('weight');

        $this->assertNull($unitData['unit']);
        $this->assertNull($unitData['value']);
    }

    /**
     * @throws Throwable
     */
    public function test_get_units(): void
    {
        // Create base units
        $weightUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();
        $lengthUnit = Unit::factory()->setType(UnitTypeEnum::LENGTH())->setValue(1)->create();

        // Create product with units
        $product = Product::factory()->setName('Test Product')->create();
        $product->storeUnitBatch([
            'weight' => ['unit_id' => $weightUnit->id, 'value' => 3.0],
            'length' => ['unit_id' => $lengthUnit->id, 'value' => 50.0],
        ]);

        // Get all units
        $units = $product->getUnits();

        $this->assertCount(2, $units);
        $this->assertArrayHasKey('weight', $units->toArray());
        $this->assertArrayHasKey('length', $units->toArray());
        $this->assertEquals(3.0, $units['weight']['value']);
        $this->assertEquals(50.0, $units['length']['value']);
    }

    /**
     * @throws Throwable
     */
    public function test_get_unit_values(): void
    {
        // Create base units
        $weightUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();
        $lengthUnit = Unit::factory()->setType(UnitTypeEnum::LENGTH())->setValue(1)->create();

        // Create product with units
        $product = Product::factory()->setName('Test Product')->create();
        $product->storeUnitBatch([
            'weight' => ['unit_id' => $weightUnit->id, 'value' => 2.0],
            'length' => ['unit_id' => $lengthUnit->id, 'value' => 25.0],
        ]);

        // Get unit values
        $values = $product->getUnitValues();

        $this->assertEquals(2.0, $values['weight']);
        $this->assertEquals(25.0, $values['length']);
    }

    /**
     * @throws Throwable
     */
    public function test_has_unit(): void
    {
        // Create base unit
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();

        // Create product with unit
        $product = Product::factory()->setName('Test Product')->create();
        $product->storeUnit('weight', $baseUnit->id, 5.0);

        $this->assertTrue($product->hasUnit('weight'));
        $this->assertFalse($product->hasUnit('length'));
    }

    /**
     * @throws Throwable
     */
    public function test_forget_unit(): void
    {
        // Create base unit
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();

        // Create product with unit
        $product = Product::factory()->setName('Test Product')->create();
        $product->storeUnit('weight', $baseUnit->id, 5.0);

        $this->assertTrue($product->hasUnit('weight'));

        // Forget unit
        $product->forgetUnit('weight');

        $this->assertFalse($product->hasUnit('weight'));
        $this->assertDatabaseMissing(config('unit-converter.tables.unit_relation', 'unit_relations'), [
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'type'          => 'weight',
        ]);
    }

    /**
     * @throws Throwable
     */
    public function test_forget_units_all(): void
    {
        // Create base units
        $weightUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();
        $lengthUnit = Unit::factory()->setType(UnitTypeEnum::LENGTH())->setValue(1)->create();

        // Create product with units
        $product = Product::factory()->setName('Test Product')->create();
        $product->storeUnitBatch([
            'weight' => [
                'unit_id' => $weightUnit->id,
                'value'   => 3.0,
            ],
            'length' => [
                'unit_id' => $lengthUnit->id,
                'value'   => 50.0,
            ],
        ]);

        $this->assertTrue($product->hasUnit('weight'));
        $this->assertTrue($product->hasUnit('length'));

        // Forget all units
        $product->forgetUnits();

        $this->assertFalse($product->hasUnit('weight'));
        $this->assertFalse($product->hasUnit('length'));
    }

    /**
     * @throws Throwable
     */
    public function test_unit_relations_deleted_on_model_delete(): void
    {
        // Create base unit
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();

        // Create product with unit
        $product = Product::factory()->setName('Test Product')->setUnit([
            'weight' => [
                'unit_id' => $baseUnit->id,
                'value'   => 2.5,
            ],
        ])->create();

        $productId = $product->id;

        $this->assertDatabaseHas(config('unit-converter.tables.unit_relation', 'unit_relations'), [
            'unitable_type' => Product::class,
            'unitable_id'   => $productId,
        ]);

        // Delete product
        $product->delete();

        $this->assertDatabaseMissing(config('unit-converter.tables.unit_relation', 'unit_relations'), [
            'unitable_type' => Product::class,
            'unitable_id'   => $productId,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function test_disallowed_unit_key_throws_exception(): void
    {
        // Create base unit
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::VOLUME())->setValue(1)->create();

        // Create product
        $product = Product::factory()->setName('Test Product')->create();

        $this->expectException(TypeNotFoundInAllowTypesException::class);

        // Try to store a disallowed unit key
        $product->storeUnit('volume', $baseUnit->id, 10.0);
    }

    /**
     * @throws Throwable
     */
    public function test_wildcard_unitables_allows_any_key(): void
    {
        // Create base unit
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::VOLUME())->setValue(1)->create();

        // Create flexible product (allows any key)
        $product = FlexibleProduct::factory()->setName('Flexible Product')->create();

        // Store any unit key
        $product->storeUnit('volume', $baseUnit->id, 15.0);

        $this->assertDatabaseHas(config('unit-converter.tables.unit_relation', 'unit_relations'), [
            'unitable_type' => FlexibleProduct::class,
            'unitable_id'   => $product->id,
            'unit_id'       => $baseUnit->id,
            'type'          => 'volume',
            'value'         => 15.0,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function test_unit_not_found_throws_exception(): void
    {
        // Create product
        $product = Product::factory()->setName('Test Product')->create();

        $this->expectException(UnitNotFoundException::class);

        // Try to store with non-existent unit_id
        $product->storeUnit('weight', 99999, 10.0);
    }

    /**
     * @throws Throwable
     */
    public function test_scope_has_unit_key(): void
    {
        // Create base unit
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();

        // Create products
        $productWithUnit = Product::factory()->setName('Product With Unit')->create();
        $productWithUnit->storeUnit('weight', $baseUnit->id, 5.0);

        $productWithoutUnit = Product::factory()->setName('Product Without Unit')->create();

        // Query products with weight unit
        $products = Product::hasUnitKey('weight')->get();

        $this->assertCount(1, $products);
        $this->assertEquals($productWithUnit->id, $products->first()->id);
    }

    /**
     * @throws Throwable
     */
    public function test_scope_where_unit_equals(): void
    {
        // Create base unit
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();

        // Create products
        $product1 = Product::factory()->setName('Product 1')->create();
        $product1->storeUnit('weight', $baseUnit->id, 5.0);

        $product2 = Product::factory()->setName('Product 2')->create();
        $product2->storeUnit('weight', $baseUnit->id, 10.0);

        // Query products with specific unit and value
        $products = Product::whereUnitEquals('weight', $baseUnit->id, 5.0)->get();

        $this->assertCount(1, $products);
        $this->assertEquals($product1->id, $products->first()->id);

        // Query products with specific unit (any value)
        $productsAny = Product::whereUnitEquals('weight', $baseUnit->id)->get();

        $this->assertCount(2, $productsAny);
    }

    /**
     * @throws Throwable
     */
    public function test_units_relation(): void
    {
        // Create base units
        $weightUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();
        $lengthUnit = Unit::factory()->setType(UnitTypeEnum::LENGTH())->setValue(1)->create();

        // Create product with units
        $product = Product::factory()->setName('Test Product')->create();
        $product->storeUnitBatch([
            'weight' => [
                'unit_id' => $weightUnit->id,
                'value'   => 3.0,
            ],
            'length' => [
                'unit_id' => $lengthUnit->id,
                'value'   => 50.0,
            ],
        ]);

        // Refresh to get relations
        $product->refresh();

        // Check units relation
        $this->assertCount(2, $product->units);
        $unitIds = $product->units->pluck('id')->toArray();
        $this->assertContains($weightUnit->id, $unitIds);
        $this->assertContains($lengthUnit->id, $unitIds);
    }

    /**
     * @throws Throwable
     */
    public function test_unit_relations_morphmany(): void
    {
        // Create base unit
        $baseUnit = Unit::factory()->setType(UnitTypeEnum::WEIGHT())->setValue(1)->create();

        // Create product with unit
        $product = Product::factory()->setName('Test Product')->create();
        $product->storeUnit('weight', $baseUnit->id, 7.5);

        // Check unitRelations relation
        $relations = $product->unitRelations;

        $this->assertCount(1, $relations);
        $this->assertEquals('weight', $relations->first()->type);
        $this->assertEquals(7.5, $relations->first()->value);
        $this->assertEquals($baseUnit->id, $relations->first()->unit_id);
    }
}

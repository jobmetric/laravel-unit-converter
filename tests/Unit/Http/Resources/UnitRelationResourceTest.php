<?php

namespace JobMetric\UnitConverter\Tests\Unit\Http\Resources;

use Illuminate\Http\Request;
use JobMetric\UnitConverter\Http\Resources\UnitRelationResource;
use JobMetric\UnitConverter\Models\Unit;
use JobMetric\UnitConverter\Models\UnitRelation;
use JobMetric\UnitConverter\Tests\Stubs\Models\Product;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitRelationResource output mapping.
 */
class UnitRelationResourceTest extends TestCase
{
    /**
     * Verify toArray returns relation fields and polymorphic references.
     *
     * @return void
     */
    public function test_to_array_contains_relation_fields(): void
    {
        $unit = Unit::query()->create([
            'type'   => 'weight',
            'value'  => 1.0,
            'status' => true,
        ]);
        $product = Product::factory()->setName('Relation Product')->create();

        $relation = UnitRelation::query()->create([
            'unit_id'       => $unit->id,
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'type'          => 'weight',
            'value'         => 5.5,
        ]);

        $array = (new UnitRelationResource($relation))->toArray(new Request);

        $this->assertSame($unit->id, $array['unit_id']);
        $this->assertSame($product->id, $array['unitable_id']);
        $this->assertSame(Product::class, $array['unitable_type']);
        $this->assertSame('weight', $array['type']);
        $this->assertEquals(5.5, (float) $array['value']);
        $this->assertArrayHasKey('created_at', $array);
    }

    /**
     * Verify toArray includes nested unit when unit relation is eager loaded.
     *
     * @return void
     */
    public function test_to_array_includes_unit_when_loaded(): void
    {
        $unit = Unit::query()->create([
            'type'   => 'length',
            'value'  => 1.0,
            'status' => true,
        ]);
        $product = Product::factory()->setName('Nested Unit Product')->create();

        $relation = UnitRelation::query()->create([
            'unit_id'       => $unit->id,
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'type'          => 'length',
            'value'         => 2.0,
        ]);
        $relation->load('unit');

        $array = (new UnitRelationResource($relation))->toArray(new Request);

        $this->assertArrayHasKey('unit', $array);
    }
}


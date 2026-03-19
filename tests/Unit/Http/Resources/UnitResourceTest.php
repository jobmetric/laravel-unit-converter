<?php

namespace JobMetric\UnitConverter\Tests\Unit\Http\Resources;

use Illuminate\Http\Request;
use JobMetric\UnitConverter\Http\Resources\UnitResource;
use JobMetric\UnitConverter\Models\Unit;
use JobMetric\UnitConverter\Models\UnitRelation;
use JobMetric\UnitConverter\Tests\Stubs\Models\Product;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitResource output mapping.
 */
class UnitResourceTest extends TestCase
{
    /**
     * Verify toArray returns base unit fields and timestamps.
     *
     * @return void
     */
    public function test_to_array_contains_base_fields(): void
    {
        $unit = Unit::query()->create([
            'type'   => 'weight',
            'value'  => 1.0,
            'status' => true,
        ]);

        $array = (new UnitResource($unit))->toArray(new Request);

        $this->assertSame($unit->id, $array['id']);
        $this->assertSame('weight', $array['type']);
        $this->assertEquals(1.0, (float) $array['value']);
        $this->assertTrue($array['status']);
        $this->assertArrayHasKey('created_at', $array);
        $this->assertArrayHasKey('updated_at', $array);
        $this->assertArrayHasKey('translations', $array);
    }

    /**
     * Verify toArray includes unit_relations key when relation is eager loaded.
     *
     * @return void
     */
    public function test_to_array_includes_unit_relations_when_loaded(): void
    {
        $unit = Unit::query()->create([
            'type'   => 'length',
            'value'  => 1.0,
            'status' => true,
        ]);
        $product = Product::factory()->setName('Resource Product')->create();

        UnitRelation::query()->create([
            'unit_id'       => $unit->id,
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'type'          => 'length',
            'value'         => 10.0,
        ]);

        $unit->load('unitRelations');

        $array = (new UnitResource($unit))->toArray(new Request);

        $this->assertArrayHasKey('unit_relations', $array);
    }
}


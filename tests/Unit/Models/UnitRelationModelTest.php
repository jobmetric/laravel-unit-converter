<?php

namespace JobMetric\UnitConverter\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use JobMetric\UnitConverter\Models\Unit;
use JobMetric\UnitConverter\Models\UnitRelation;
use JobMetric\UnitConverter\Tests\Stubs\Models\Product;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for UnitRelation model metadata and relations.
 */
class UnitRelationModelTest extends TestCase
{
    /**
     * Verify getTable returns configured relation table name.
     *
     * @return void
     */
    public function test_get_table_returns_configured_name(): void
    {
        $this->assertSame('unit_relations', (new UnitRelation)->getTable());
    }

    /**
     * Verify unit relation belongs to Unit model.
     *
     * @return void
     */
    public function test_unit_relation_returns_belongs_to_unit(): void
    {
        $relation = (new UnitRelation)->unit();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertSame(Unit::class, $relation->getRelated()::class);
    }

    /**
     * Verify unitable relation returns morph-to relation.
     *
     * @return void
     */
    public function test_unitable_relation_returns_morph_to(): void
    {
        $relation = (new UnitRelation)->unitable();

        $this->assertInstanceOf(MorphTo::class, $relation);
    }

    /**
     * Verify ofType scope filters relation records by type.
     *
     * @return void
     */
    public function test_scope_of_type_filters_records(): void
    {
        $unit = Unit::query()->create([
            'type'   => 'weight',
            'value'  => 1.0,
            'status' => true,
        ]);
        $product = Product::factory()->setName('Scope Product')->create();

        UnitRelation::query()->create([
            'unit_id'       => $unit->id,
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'type'          => 'weight',
            'value'         => 2.0,
        ]);
        UnitRelation::query()->create([
            'unit_id'       => $unit->id,
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'type'          => 'length',
            'value'         => 3.0,
        ]);

        $weightRelations = UnitRelation::query()->ofType('weight')->get();

        $this->assertCount(1, $weightRelations);
        $this->assertSame('weight', $weightRelations->first()->type);
    }

    /**
     * Verify created_at is auto-filled during creation when not provided.
     *
     * @return void
     */
    public function test_creating_sets_created_at_when_missing(): void
    {
        $unit = Unit::query()->create([
            'type'   => 'length',
            'value'  => 1.0,
            'status' => true,
        ]);
        $product = Product::factory()->setName('Timestamp Product')->create();

        $relation = UnitRelation::query()->create([
            'unit_id'       => $unit->id,
            'unitable_type' => Product::class,
            'unitable_id'   => $product->id,
            'type'          => 'length',
            'value'         => 1.5,
        ]);

        $this->assertNotNull($relation->created_at);
    }
}


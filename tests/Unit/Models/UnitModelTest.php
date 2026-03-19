<?php

namespace JobMetric\UnitConverter\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use JobMetric\UnitConverter\Models\Unit;
use JobMetric\UnitConverter\Models\UnitRelation;
use JobMetric\UnitConverter\Tests\TestCase;

/**
 * Unit tests for Unit model metadata and relations.
 */
class UnitModelTest extends TestCase
{
    /**
     * Verify getTable returns configured unit table name.
     *
     * @return void
     */
    public function test_get_table_returns_configured_name(): void
    {
        $this->assertSame('units', (new Unit)->getTable());
    }

    /**
     * Verify fillable contains expected mass-assignable fields.
     *
     * @return void
     */
    public function test_fillable_contains_expected_fields(): void
    {
        $fillable = (new Unit)->getFillable();

        $this->assertContains('type', $fillable);
        $this->assertContains('value', $fillable);
        $this->assertContains('status', $fillable);
    }

    /**
     * Verify unitRelations relation is a HasMany relation to UnitRelation model.
     *
     * @return void
     */
    public function test_unit_relations_relation_returns_has_many(): void
    {
        $relation = (new Unit)->unitRelations();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertSame(UnitRelation::class, $relation->getRelated()::class);
    }

    /**
     * Verify ofType scope filters units by type key.
     *
     * @return void
     */
    public function test_scope_of_type_filters_records(): void
    {
        Unit::query()->create([
            'type'   => 'weight',
            'value'  => 1.0,
            'status' => true,
        ]);
        Unit::query()->create([
            'type'   => 'length',
            'value'  => 1.0,
            'status' => true,
        ]);

        $weightUnits = Unit::query()->ofType('weight')->get();

        $this->assertCount(1, $weightUnits);
        $this->assertSame('weight', $weightUnits->first()->type);
    }
}


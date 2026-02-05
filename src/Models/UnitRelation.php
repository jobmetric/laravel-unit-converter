<?php

namespace JobMetric\UnitConverter\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use JobMetric\PackageCore\Traits\HasMorphResourceAttributes;

/**
 * Class UnitRelation
 *
 * Represents a polymorphic relation between a unit and any Eloquent model
 * that can use units. This allows attaching a unit to any entity (Product, Order, etc.)
 * while also storing the unit type and the value in that unit.
 *
 * @package JobMetric\UnitConverter
 *
 * @property int $unit_id            The attached unit identifier.
 * @property string $unitable_type   The class name of the related model.
 * @property int $unitable_id        The ID of the related model instance.
 * @property string $type            The unit type (weight, length, volume, etc.).
 * @property float $value            The value stored in the attached unit.
 * @property Carbon $created_at      The timestamp when this relation was created.
 *
 * @property-read Unit $unit
 * @property-read Model|MorphTo $unitable
 * @property-read mixed $unitable_resource
 *
 * @method static Builder|UnitRelation whereUnitId(int $unit_id)
 * @method static Builder|UnitRelation whereUnitableType(string $unitable_type)
 * @method static Builder|UnitRelation whereUnitableId(int $unitable_id)
 * @method static Builder|UnitRelation whereType(string $type)
 * @method static Builder|UnitRelation whereValue(float $value)
 * @method static Builder|UnitRelation ofType(string $type)
 */
class UnitRelation extends Pivot
{
    use HasFactory, HasMorphResourceAttributes;

    /**
     * This table does not have Laravel's updated_at column.
     *
     * @var bool
     */
    public const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'unit_id',
        'unitable_type',
        'unitable_id',
        'type',
        'value',
        'created_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'unit_id'       => 'integer',
        'unitable_type' => 'string',
        'unitable_id'   => 'integer',
        'type'          => 'string',
        'value'         => 'float',
        'created_at'    => 'datetime',
    ];

    /**
     * Override the table name using config.
     *
     * @return string
     */
    public function getTable(): string
    {
        return config('unit.tables.unit_relation', parent::getTable());
    }

    /**
     * Initialize model events.
     *
     * @return void
     */
    protected static function booted(): void
    {
        // Ensure created_at is set by application layer as well (DB has default too).
        static::creating(function (self $relation): void {
            if (empty($relation->created_at)) {
                $relation->created_at = now();
            }
        });
    }

    /**
     * Get the related unit.
     *
     * @return BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Get the related model (polymorphic).
     *
     * @return MorphTo
     */
    public function unitable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Scope a query to only include relations of a given unit type.
     *
     * @param Builder $query
     * @param string $type
     *
     * @return Builder
     */
    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }
}

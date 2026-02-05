<?php

namespace JobMetric\UnitConverter\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use JobMetric\Media\Contracts\MediaContract;
use JobMetric\Media\HasFile;
use JobMetric\PackageCore\Models\HasBooleanStatus;
use JobMetric\Translation\HasTranslation;
use JobMetric\Translation\Models\Translation;

/**
 * Class Unit
 *
 * Represents a measurement unit that can be used for conversions.
 * Each unit belongs to a specific type (weight, length, volume, etc.) and has
 * a conversion value relative to the base unit of its type. Units support
 * translations for name, code, position, and description. Units can be
 * attached to any model using the HasUnit trait via polymorphic relations.
 *
 * @package JobMetric\UnitConverter
 *
 * @property int $id                         The primary identifier of the unit.
 * @property string $type                    The type of measurement unit (weight, length, volume, etc.).
 * @property float $value                    Conversion value relative to base unit (base unit = 1).
 * @property bool $status                    Active flag (true=enabled, false=disabled).
 * @property Carbon $created_at              The timestamp when this unit was created.
 * @property Carbon $updated_at              The timestamp when this unit was last updated.
 *
 * @property-read UnitRelation[] $unitRelations
 * @property-read Translation[] $translations
 *
 * @method static Builder|Unit ofType(string $type) Filter units by type.
 * @method static Builder|Unit whereType(string $type)
 * @method static Builder|Unit whereValue(float $value)
 * @method static Builder|Unit whereStatus(bool $status)
 */
class Unit extends Model implements MediaContract
{
    use HasFactory, HasBooleanStatus, HasTranslation, HasFile;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'value',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type'   => 'string',
        'value'  => 'decimal:15',
        'status' => 'boolean',
    ];

    /**
     * Override the table name using config.
     *
     * @return string
     */
    public function getTable(): string
    {
        return config('unit.tables.unit', parent::getTable());
    }

    /**
     * The attributes that are translatable.
     *
     * @var array<int, string>
     */
    protected array $translatables = [
        'name',
        'code',
        'position',
        'description',
    ];

    /**
     * Get all relations where this unit is used.
     *
     * Returns all polymorphic relations where this unit is attached to models
     * (e.g., products, orders, etc.) via the HasUnit trait.
     *
     * @return HasMany
     */
    public function unitRelations(): HasMany
    {
        return $this->hasMany(UnitRelation::class, 'unit_id');
    }

    /**
     * Scope a query to only include units of a given type.
     *
     * @param Builder $query
     * @param string $type The unit type to filter by (e.g., 'weight', 'length').
     *
     * @return Builder
     */
    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * media allow collections.
     *
     * @return array
     */
    public function mediaAllowCollections(): array
    {
        return [
            'base' => [
                'media_collection' => 'public',
                'size'             => [
                    'default' => [
                        'w' => config('unit.default_image_size.width'),
                        'h' => config('unit.default_image_size.height'),
                    ],
                ],
            ],
        ];
    }
}

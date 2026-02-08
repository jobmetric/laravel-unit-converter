<?php

namespace JobMetric\UnitConverter\Tests\Stubs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;
use JobMetric\UnitConverter\HasUnit;
use JobMetric\UnitConverter\Tests\Stubs\Factories\ProductFactory;

/**
 * @property int $id
 * @property string $name
 * @property string $status
 *
 * @method static create(array $attributes)
 */
class Product extends Model
{
    use HasFactory, HasUnit;

    protected $fillable = [
        'name',
        'status',
    ];

    protected $casts = [
        'name'   => 'string',
        'status' => 'string',
    ];

    /**
     * Define allowed unit keys and their expected types.
     *
     * @var array<string, string>
     */
    protected array $unitables = [
        'weight' => UnitTypeEnum::WEIGHT,
        'length' => UnitTypeEnum::LENGTH,
        'width'  => UnitTypeEnum::LENGTH,
        'height' => UnitTypeEnum::LENGTH,
    ];

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }
}


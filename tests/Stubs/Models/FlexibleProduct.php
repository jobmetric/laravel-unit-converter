<?php

namespace JobMetric\UnitConverter\Tests\Stubs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JobMetric\UnitConverter\HasUnit;
use JobMetric\UnitConverter\Tests\Stubs\Factories\FlexibleProductFactory;

/**
 * A product model that allows any unit key (wildcard configuration).
 *
 * @property int $id
 * @property string $name
 * @property string $status
 *
 * @method static create(array $attributes)
 */
class FlexibleProduct extends Model
{
    use HasFactory, HasUnit;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'status',
    ];

    protected $casts = [
        'name'   => 'string',
        'status' => 'string',
    ];

    /**
     * Allow any unit key (wildcard).
     *
     * @var array<int, string>
     */
    protected array $unitables = ['*'];

    protected static function newFactory(): FlexibleProductFactory
    {
        return FlexibleProductFactory::new();
    }
}


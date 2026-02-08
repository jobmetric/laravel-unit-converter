[contributors-shield]: https://img.shields.io/github/contributors/jobmetric/laravel-unit-converter.svg?style=for-the-badge
[contributors-url]: https://github.com/jobmetric/laravel-unit-converter/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/jobmetric/laravel-unit-converter.svg?style=for-the-badge&label=Fork
[forks-url]: https://github.com/jobmetric/laravel-unit-converter/network/members
[stars-shield]: https://img.shields.io/github/stars/jobmetric/laravel-unit-converter.svg?style=for-the-badge
[stars-url]: https://github.com/jobmetric/laravel-unit-converter/stargazers
[license-shield]: https://img.shields.io/github/license/jobmetric/laravel-unit-converter.svg?style=for-the-badge
[license-url]: https://github.com/jobmetric/laravel-unit-converter/blob/master/LICENCE.md
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-blue.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/majidmohammadian

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

# Laravel Unit Converter

**Unit Management for Laravel. Flexible. Precise.**

Laravel Unit Converter helps you manage and convert measurement units in a clean, consistent way—from Weight and Length to Currency, Volume, Temperature, and 30+ other unit types. It is designed to be used as a reusable package in real-world Laravel applications where unit conversion needs to be normalized and shared across multiple models.

## Why Laravel Unit Converter?

### Comprehensive Unit Type Support

Support for 30+ unit types out of the box:

- **Physical Units**: Weight, Length, Volume, Area, Temperature, Pressure, Speed, Force, Energy, Power, and more
- **Digital Units**: Data Storage, Data Transfer
- **Scientific Units**: Electric Current, Voltage, Resistance, Capacitance, Inductance, Magnetic Flux, Radiation
- **Everyday Units**: Currency, Time, Cooking measurements, Fuel Consumption

### Flexible Base Unit System

Each unit type has a base unit (value = 1) that serves as the conversion reference. All other units in the same type are defined relative to this base, making conversions accurate and consistent.

### Service-first API + Facade

The `UnitConverter` service provides a complete API for:

- Creating and managing units
- Converting values between units
- Changing base units dynamically
- Tracking unit usage across your application

## Quick Start

Install via Composer:

```bash
composer require jobmetric/laravel-unit-converter
```

Run migrations:

```bash
php artisan migrate
```

Optionally publish config/translations (if you need to override defaults):

```bash
php artisan vendor:publish --provider="JobMetric\\UnitConverter\\UnitConverterServiceProvider"
```

## Usage (Examples)

Store a unit using the Facade:

```php
use JobMetric\UnitConverter\Facades\UnitConverter;

$response = UnitConverter::store([
    'type' => 'weight',
    'value' => 1000,       // 1 kilogram = 1000 grams (if gram is base)
    'status' => true,
    'translation' => [
        'en' => [
            'name' => 'Kilogram',
            'code' => 'kg',
        ],
        'fa' => [
            'name' => 'کیلوگرم',
            'code' => 'کیلوگرم',
        ],
    ],
]);
```

Convert between units:

```php
use JobMetric\UnitConverter\Facades\UnitConverter;

// Convert 5 kilograms to grams
$result = UnitConverter::convert($kilogramUnitId, $gramUnitId, 5);
// Result: 5000

// Or use the helper function
$result = unitConvert($kilogramUnitId, $gramUnitId, 5);
```

Attach units to your models using traits:

```php
use Illuminate\Database\Eloquent\Model;
use JobMetric\UnitConverter\HasUnit;

class Product extends Model
{
    use HasUnit;

    protected array $unitables = [
        'weight' => 'weight',
        'length' => 'length',
        'width'  => 'length',
        'height' => 'length',
    ];
}
```

Assign units to a model:

```php
$product->fill([
    'unit' => [
        'weight' => ['unit_id' => 1, 'value' => 2.5],
        'length' => ['unit_id' => 2, 'value' => 30],
        'width'  => ['unit_id' => 2, 'value' => 20],
        'height' => ['unit_id' => 2, 'value' => 10],
    ]
]);
$product->save();
```

## Available Artisan Commands

```bash
# List all registered units
php artisan unit:list

# Convert a value between units
php artisan unit:convert

# Export units to file
php artisan unit:export

# Seed default units
php artisan unit:seed
```

## Documentation

Documentation for Laravel Unit Converter is available here:

**[📚 Read Full Documentation →](https://jobmetric.github.io/packages/laravel-unit-converter/)**

The documentation includes:

- **Getting Started** - Installation and configuration
- **Traits** - `HasUnit` for attaching units to models
- **Services & Facades** - Complete API reference for UnitConverter
- **Unit Types** - All 30+ supported unit types
- **Requests & Resources** - Validation and API responses
- **Events** - Hook into lifecycle events (`UnitStoreEvent`, `UnitUpdateEvent`, `UnitDeleteEvent`)
- **Helper Functions** - `unitConvert()` and more
- **Testing** - How to run package tests and expected patterns

## Contributing

Thank you for participating in `laravel-unit-converter`. A contribution guide can be found [here](CONTRIBUTING.md).

## License

The `laravel-unit-converter` is open-sourced software licensed under the MIT license. See [License File](LICENCE.md) for more information.

<?php

namespace JobMetric\UnitConverter\Tests\Stubs\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\UnitConverter\Tests\Stubs\Models\Product;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'   => $this->faker->words(3, true),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
        ];
    }

    /**
     * Set the product name.
     *
     * @param string $name
     *
     * @return static
     */
    public function setName(string $name): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => $name,
        ]);
    }

    /**
     * Set the product status.
     *
     * @param string $status
     *
     * @return static
     */
    public function setStatus(string $status): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => $status,
        ]);
    }

    /**
     * Set unit data to be saved with the product.
     *
     * @param array $unit
     *
     * @return static
     */
    public function setUnit(array $unit): static
    {
        return $this->state(fn (array $attributes) => [
            'unit' => $unit,
        ]);
    }
}


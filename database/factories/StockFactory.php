<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => '',
            'size'     => fake()->randomElement(['S', 'M', 'L', 'XL']),
            'colour'   => fake()->randomElement(['Red', 'Black', 'White', 'Green']),
            'quantity' => fake()->numerify('##'),
        ];
    }
}

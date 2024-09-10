<?php

namespace Database\Factories;

use App\Models\Suit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Suit>
 */
class SuitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'symbol' => $this->faker->unique()->randomLetter(),
            'color' => $this->faker->colorName,
        ];
    }
}

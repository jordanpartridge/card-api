<?php

namespace Database\Factories;

use App\Models\Suit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rank' => $this->faker->numberBetween(1, 13),
            'suit_id' => Suit::factory(),
        ];
    }
}

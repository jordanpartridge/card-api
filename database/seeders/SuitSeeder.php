<?php

namespace Database\Seeders;

use App\Models\Suit;
use Illuminate\Database\Seeder;

class SuitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suits = [
            [
                'name' => 'Hearts',
                'symbol' => '♥',
                'color' => '#FF0000',
            ],
            [
                'name' => 'Diamonds',
                'symbol' => '♦',
                'color' => '#FF0000',
            ],
            [
                'name' => 'Clubs',
                'symbol' => '♣',
                'color' => '#000000',
            ],
            [
                'name' => 'Spades',
                'symbol' => '♠',
                'color' => '#000000',
            ],
        ];

        foreach ($suits as $suit) {
            Suit::updateOrCreate(['name' => $suit['name']], $suit);
        }
    }
}

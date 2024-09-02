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
                'unicode' => '2665',
                'color' => '#FF0000',
            ],
            [
                'name' => 'Diamonds',
                'symbol' => '♦',
                'unicode' => '2666',
                'color' => '#FF0000',
            ],
            [
                'name' => 'Clubs',
                'symbol' => '♣',
                'unicode' => '2663',
                'color' => '#000000',
            ],
            [
                'name' => 'Spades',
                'symbol' => '♠',
                'unicode' => '2660',
                'color' => '#000000',
            ],
        ];

        foreach ($suits as $suit) {
            Suit::updateOrCreate(['name' => $suit['name']], $suit);
        }
    }
}

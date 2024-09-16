<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Suit;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Only seed the database if there are no cards
         */
        if (Card::exists()) {
            return;
        }

        $suits = Suit::pluck('id');
        $ranks = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
        foreach ($ranks as $rank) {
            foreach ($suits as $suit) {
                Card::factory()->create([
                    'rank' => $rank,
                    'suit_id' => $suit,
                ]);
            }
        }

        /**
         * Create joker card this will only create one, as the decks table
         *  will represent unique cards; however decks can have multiple jokers
         */
        Card::factory()->create([
            'rank' => 'Joker',
            'suit_id' => null,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Enum\Rank;
use App\Events\CardCreated;
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

        $suits = Suit::pluck('name');
        $ranks = Rank::cases();

        foreach ($ranks as $rank) {
            if ($rank === Rank::JOKER) {
                continue; // We'll handle the Joker separately
            }
            foreach ($suits as $suit) {
                CardCreated::fire(rank: $rank, suit: $suit);
            }
        }

        /**
         * Create joker card this will only create one, as the decks table
         * will represent unique cards; however decks can have multiple jokers
         */
        CardCreated::fire(rank: Rank::JOKER, suit: 'Joker');

    }
}

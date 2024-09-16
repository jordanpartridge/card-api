<?php

namespace App\Http\Controllers\Decks;

use App\Http\Resources\CardResource;
use App\Models\Deck;

final class ShuffleController
{
    public function __invoke(Deck $deck)
    {
        $deck->shuffle();

        return CardResource::collection($deck->cards);
    }
}

<?php

namespace App\Http\Controllers\Decks;

use App\Http\Resources\CardResource;
use App\Models\Deck;

final class CardsController
{
    public function __invoke(Deck $deck)
    {
        return CardResource::collection($deck->cards()->paginate());
    }
}

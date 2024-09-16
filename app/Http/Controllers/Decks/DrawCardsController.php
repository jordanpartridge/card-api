<?php

namespace App\Http\Controllers\Decks;

use App\Http\Resources\CardResource;
use App\Models\Deck;
use Illuminate\Http\Request;

final class DrawCardsController
{
    final public function __invoke(Request $request, Deck $deck)
    {
        $cards = $deck->draw($request->query('count', 1));

        return CardResource::collection($cards);
    }
}

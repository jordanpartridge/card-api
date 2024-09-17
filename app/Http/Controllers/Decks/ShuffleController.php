<?php

namespace App\Http\Controllers\Decks;

use App\Http\Resources\CardResource;
use App\Models\Deck;
use Illuminate\Http\Request;

final class ShuffleController
{
    public function __invoke(Request $request, Deck $deck)
    {
        if ($request->input('reset')) {
            $deck->initialize();
        }

        $deck->shuffle();

        return CardResource::collection($deck->cards);
    }
}

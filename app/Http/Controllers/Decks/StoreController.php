<?php

namespace App\Http\Controllers\Decks;

use App\Http\Requests\StoreDeckRequest;
use App\Models\Deck;
use Illuminate\Http\JsonResponse;

class StoreController
{
    public function __invoke(StoreDeckRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $deck = Deck::factory($validated)->create();

        return response()->json($deck);
    }
}

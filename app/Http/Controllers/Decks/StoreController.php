<?php

namespace App\Http\Controllers\Decks;

use App\Http\Requests\StoreDeckRequest;
use App\Http\Resources\DeckResource;
use App\Models\Deck;

class StoreController
{
    public function __invoke(StoreDeckRequest $request): DeckResource
    {
        return new DeckResource(Deck::factory($request->validated())->create());
    }
}

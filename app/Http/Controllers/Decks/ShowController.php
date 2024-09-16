<?php

namespace App\Http\Controllers\Decks;

use App\Http\Resources\DeckResource;
use App\Models\Deck;

final class ShowController
{
    public function __invoke(Deck $deck): DeckResource
    {
        return new DeckResource($deck);
    }
}

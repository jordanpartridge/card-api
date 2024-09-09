<?php

namespace App\Http\Controllers\Cards;

use App\Http\Resources\CardResource;
use App\Models\Card;

class ShowController
{
    public function __invoke(Card $card): CardResource
    {
        return new CardResource($card);
    }
}

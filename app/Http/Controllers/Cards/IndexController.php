<?php

namespace App\Http\Controllers\Cards;

use App\Http\Resources\CardResource;
use App\Models\Card;

final class IndexController
{
    public function __invoke()
    {
        return CardResource::collection(Card::query()->paginate());
    }
}

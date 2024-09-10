<?php

namespace App\Http\Controllers\Cards;

use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class IndexController
{
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        return CardResource::collection(Card::query()->paginate($request->query('paginate', 15)));
    }
}

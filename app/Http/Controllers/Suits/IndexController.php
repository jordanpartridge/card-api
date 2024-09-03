<?php

namespace App\Http\Controllers\Suits;

use App\Http\Resources\SuitResource;
use App\Models\Suit;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Cache;

class IndexController
{
    public function __invoke(): AnonymousResourceCollection
    {
        Cache::forever('suits', Suit::all());

        return SuitResource::collection(Cache::get('suits'));
    }
}

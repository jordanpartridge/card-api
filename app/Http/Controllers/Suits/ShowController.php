<?php

namespace App\Http\Controllers\Suits;

use App\Http\Resources\SuitResource;
use App\Models\Suit;

class ShowController
{
    public function __invoke(Suit $suit): SuitResource
    {
        return new SuitResource($suit);
    }
}

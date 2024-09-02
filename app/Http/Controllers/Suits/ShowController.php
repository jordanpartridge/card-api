<?php

namespace App\Http\Controllers\Suits;

use App\Models\Suit;
use Illuminate\Http\JsonResponse;

class ShowController
{
    public function __invoke(Suit $suit): JsonResponse
    {
        return response()->json([
            'data' => $suit,
        ]);
    }
}

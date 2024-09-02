<?php

namespace App\Http\Controllers\Suits;

use App\Models\Suit;
use Illuminate\Http\JsonResponse;

class IndexController
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'data' => Suit::all(),
        ]);
    }
}

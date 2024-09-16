<?php

use Illuminate\Support\Facades\Route;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Your API Name",
 *     description="Your API Description"
 * )
 */

/**
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer"
 * )
 */
Route::middleware(['auth:sanctum'])->prefix('v1')->as('v1:')->group(static function () {
    /**
     * @OA\Tag(
     *     name="Users",
     *     description="API Endpoints of Users"
     * )
     */
    Route::prefix('users')->as('users:')->group(base_path('routes/api/v1/users.php'));

    /**
     * @OA\Tag(
     *     name="Suits",
     *     description="API Endpoints of Suits"
     * )
     */
    Route::prefix('suits')->as('suits:')->group(base_path('routes/api/v1/suits.php'));

    /**
     * @OA\Tag(
     *     name="Cards",
     *     description="API Endpoints of Cards"
     * )
     */
    Route::prefix('cards')->as('cards:')->group(base_path('routes/api/v1/cards.php'));

    /**
     * @OA\Tag(
     *     name="Decks",
     *     description="API Endpoints of Decks"
     * )
     */
    Route::prefix('decks')->as('decks:')->group(base_path('routes/api/v1/decks.php'));
});

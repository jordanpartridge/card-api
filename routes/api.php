<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->prefix('v1')->as('v1:')->group(static function () {
    Route::prefix('users')->as('users:')->group(base_path('routes/api/v1/users.php'));
    Route::prefix('suits')->as('suits:')->group(base_path('routes/api/v1/suits.php'));
    Route::prefix('cards')->as('cards:')->group(base_path('routes/api/v1/cards.php'));
});

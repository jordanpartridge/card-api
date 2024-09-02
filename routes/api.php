<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->prefix('v1')->as('v1:')->group(static function () {
    Route::prefix('users')->as('users:')->group(base_path('routes/api/v1/users.php'));
});

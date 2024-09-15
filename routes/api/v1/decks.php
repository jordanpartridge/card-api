<?php

use App\Http\Controllers\Decks\StoreController;

Route::post('/', StoreController::class)->name('store');

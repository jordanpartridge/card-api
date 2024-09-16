<?php

use App\Http\Controllers\Decks\CardsController;
use App\Http\Controllers\Decks\DrawCardsController;
use App\Http\Controllers\Decks\ShowController;
use App\Http\Controllers\Decks\StoreController;

Route::post('/', StoreController::class)->name('store');
Route::get('{deck}', ShowController::class)->name('show');
Route::get('{deck}/cards', CardsController::class)->name('cards');
Route::put('{deck}/draw', DrawCardsController::class)->name('draw');

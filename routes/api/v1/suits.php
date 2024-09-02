<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Suits\IndexController::class)->name('index');
Route::get('{suit}', \App\Http\Controllers\Suits\ShowController::class)->name('show');

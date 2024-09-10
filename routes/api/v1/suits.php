<?php

use App\Http\Controllers\Suits\IndexController;
use App\Http\Controllers\Suits\ShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');
Route::get('{suit}', ShowController::class)->name('show');

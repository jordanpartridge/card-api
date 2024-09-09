<?php

use App\Http\Controllers\Cards\IndexController;
use App\Http\Controllers\Cards\ShowController;

Route::get('/', IndexController::class)->name('index');
Route::get('{card}', ShowController::class)->name('show');

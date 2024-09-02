<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Users\IndexController::class)->name('index');

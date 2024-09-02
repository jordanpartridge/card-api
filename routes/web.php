<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['card-api' => 'v1'];
});

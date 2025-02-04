<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Default', [DefaultController::class, 'index']);
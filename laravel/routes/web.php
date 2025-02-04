<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/gallery/index', [GalleryController::class, 'index']);
Route::get('/gallery/create', [GalleryController::class, 'create']);
Route::delete('/gallery/destroy', [GalleryController::class, 'destroy']);
Route::post('/gallery', [GalleryController::class, 'store']);
Route::get('/gallery/{id}', [GalleryController::class, 'show']);
Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit']);
Route::put('/gallery/{id}', [GalleryController::class, 'update']);
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy']);
Route::post('/gallery/store', [GalleryController::class, 'store']);
Route::get('/gallery/show/{id}', [GalleryController::class, 'show']);

Route::get('/image', [ImageController::class, 'index']);
Route::get('/image/create', [ImageController::class, 'create']);
Route::post('/image', [ImageController::class, 'store']);
Route::get('/image/{id}', [ImageController::class, 'show']);
Route::get('/image/{id}/edit', [ImageController::class, 'edit']);
Route::put('/image/{id}', [ImageController::class, 'update']);
Route::delete('/image/{id}', [ImageController::class, 'destroy']);

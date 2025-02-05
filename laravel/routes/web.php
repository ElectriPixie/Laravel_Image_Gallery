<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return redirect('/gallery/index', 301);
});

Route::get('/gallery', function () {
    return redirect('/gallery/index', 301);
});
Route::get('/gallery/index', [GalleryController::class, 'index']);
Route::get('/gallery/create', [GalleryController::class, 'create']);
Route::post('/gallery/store', [GalleryController::class, 'store']);
Route::get('/gallery/{gallery_id}', function($gallery_id) {
    return redirect('/gallery/' . $gallery_id . '/show', 301);
});
Route::get('/gallery/{gallery_id}/edit', [GalleryController::class, 'edit']);
Route::patch('/gallery/{gallery_id}/update', [GalleryController::class, 'update']);
Route::get('/gallery/{gallery_id}/show/', [GalleryController::class, 'show']);
Route::delete('/gallery/{gallery_id}/destroy', [GalleryController::class, 'destroy']);

#Route::get('/gallery/{gallery_id}/image', [ImageController::class, 'index']);
Route::get('/gallery/{gallery_id}/image/create', [ImageController::class, 'create']);
Route::post('/gallery/{gallery_id}/image/store', [ImageController::class, 'store']);
Route::get('/gallery/{gallery_id}/image/{image_id}', function($gallery_id, $image_id) {
    return redirect('/gallery/' . $gallery_id . '/image/' . $image_id . '/show', 301);
});
Route::get('/gallery/{gallery_id}/image/{image_id}/show', [ImageController::class, 'show']);
Route::get('/gallery/{gallery_id}/image/{image_id}/edit', [ImageController::class, 'edit']);
Route::patch('/gallery/{gallery_id}/image/{image_id}/update', [ImageController::class, 'update']);
Route::delete('/gallery/{gallery_id}/image/{image_id}/destroy', [ImageController::class, 'destroy']);
?>
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware([VerifyApiKey::class])->group(function () {
    Route::get('/playlists', [PlaylistController::class, 'index']);
});
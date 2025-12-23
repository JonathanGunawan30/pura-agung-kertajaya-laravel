<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index']);

Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, 'index']);

Route::get('/organization', [\App\Http\Controllers\OrganizatioinController::class, 'index']);

Route::get('/privacy', [\App\Http\Controllers\PageController::class, 'privacy']);
Route::get('/terms', [\App\Http\Controllers\PageController::class, 'terms']);

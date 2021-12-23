<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->group(function () {}

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('{code}', [App\Http\Controllers\UrlController::class, 'show'])->name('url-show');
Route::post('generate_url', [App\Http\Controllers\UrlController::class, 'generate'])->name('url-generate');


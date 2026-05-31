<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;


Route::get('/', [ContactController::class, 'index']);
Route::post('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'thanks']);
Route::middleware('auth')->group(function () {
        Route::get('/admin', [UserController::class, 'admin']);
});
Route::get('/search', [UserController::class, 'search']);
Route::delete('/delete', [UserController::class, 'destroy']);
Route::get('/export', [UserController::class, 'export']);
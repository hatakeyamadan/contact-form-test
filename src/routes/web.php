<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;


Route::match(['get', 'post'], '/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'thanks']);
Route::middleware('auth')->group(function () {
        Route::get('/admin', [UserController::class, 'admin']);
});
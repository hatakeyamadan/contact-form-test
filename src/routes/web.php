<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::match(['get', 'post'], '/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'thanks']);
Route::get('/register', [ContactController::class, 'register']);
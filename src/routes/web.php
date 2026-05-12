<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\ContactController;


Route::get('/', [ContactController::class, 'index']);

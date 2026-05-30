<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    public function admin()
    {
        return view('admin');
    }
}

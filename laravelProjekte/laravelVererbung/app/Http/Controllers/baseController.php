<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class baseController extends Controller
{
    public function login()
    {
        return view('login');
    }
}

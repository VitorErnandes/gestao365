<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;

class GlobalController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}

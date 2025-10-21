<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaandingController extends Controller
{
    public function index()
    {
        return view('index');
    }
}

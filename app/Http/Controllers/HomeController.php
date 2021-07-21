<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function show()
    {
        if(auth()->check()) {
            return view('dashboard');
        } else {
            return view('welcome');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Tenant;
use App\Models\User;

class HomeController extends Controller
{
    public function show()
    {
        if(auth()->check()) {
            if(session()->has('tenant_id')) {
                return view('dashboard');
            }

            return view('super.dashboard', [
                'subscribersCount' => Tenant::count(),
                'usersCount' => User::count(),
                'loginsCount' => Login::count(),
            ]);
        } else {
            return view('welcome');
        }
    }
}

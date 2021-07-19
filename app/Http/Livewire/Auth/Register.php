<?php

namespace App\Http\Livewire\Auth;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    public string $name = '';
    public string $companyName = '';
    public string $email = '';
    public string $password = '';

    public function register()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:8'],
            'companyName' => ['required', 'string', 'unique:tenants,name', 'min:8'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);

        $tenant = Tenant::create([
            'name' => $this->companyName,
        ]);

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'role' => 'admin',
            'password' => Hash::make($this->password),
            'tenant_id' => $tenant->id,
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function updated($value) {
        $this->resetErrorBag($value);
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}

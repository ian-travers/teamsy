<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddUser extends Component
{
    public string $name = "Kevin McKee";
    public string $email = "kevin@lc.com";
    public string $department = 'information_technology';
    public string $title = "Instructor";
    public $photo;
    public int $status = 1;
    public string $role = 'admin';

    public function submit()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'department' => 'required|string',
            'title' => 'required|string',
            'status' => 'required|boolean',
            'role' => 'required|string',
        ]);

    }

    public function render()
    {
        return view('livewire.add-user');
    }
}

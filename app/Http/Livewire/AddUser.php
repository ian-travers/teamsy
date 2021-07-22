<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddUser extends Component
{
    use WithFileUploads;

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
            'photo' => 'image|max:512',
        ]);

        $filename = $this->photo->store('photos', 'public');

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'department' => $this->department,
            'title' => $this->title,
            'status' => $this->status,
            'role' => $this->role,
            'photo' => $filename,
            'password' => bcrypt(Str::random(16)),
        ]);

        session()->flash('success', 'We did it!');
    }

    public function render()
    {
        return view('livewire.add-user');
    }
}

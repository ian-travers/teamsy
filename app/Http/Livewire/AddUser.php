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
    public $application;
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
            'photo' => 'nullable|image|max:1024',
            'application' => 'nullable|file|mimes:pdf|max:512',
        ]);

//        $filename = $this->photo ? $this->photo->store('photos', 'public') : null;
        $filename = $this->photo ? $this->photo->store('photos', 's3-public') : null;


        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'department' => $this->department,
            'title' => $this->title,
            'status' => $this->status,
            'role' => $this->role,
            'photo' => $filename,
            'password' => bcrypt(Str::random(16)),
        ]);

        $filename = $this->application
            ? pathinfo($this->application->getClientOriginalName(), PATHINFO_FILENAME)
            . '_' . now()->timestamp . '.' . $this->application->getClientOriginalExtension()
            : null;

        $extension = $this->application
            ? $this->application->getClientOriginalExtension()
            : null;

        $size = $this->application
            ? $this->application->getSize()
            : null;

        if ($filename) {
            $this->application->storeAs('documents/' . $user->id, $filename, 'public');

            $user->documents()->create([
                'type' => 'application',
                'filename' => $filename,
                'extension' => $extension,
                'size' => $size,
            ]);
        }



        session()->flash('success', 'We did it!');
    }

    public function render()
    {
        return view('livewire.add-user');
    }
}

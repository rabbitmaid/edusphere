<?php

namespace App\Livewire\Dashboard\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Create extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $role = '';
    public string $gender = '';

    public function create()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
            'role' => ['required'],
            'gender' => ['required']
        ]);

        $validated['password'] = Hash::make($validated['password']);
        
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'gender' => $validated['gender']
        ]);

        // event(new Registered(($user = User::create($validated))));

        $user->assignRole($validated['role']);

        $this->redirect(route('admin.dashboard.users', absolute: false), navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.users.create');
    }
}

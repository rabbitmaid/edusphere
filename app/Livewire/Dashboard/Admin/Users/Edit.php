<?php

namespace App\Livewire\Dashboard\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Edit extends Component
{   
    public int $id;
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $is_active;
    public string $gender = '';

    public function mount()
    {
        $user = User::find($this->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_active = $user->is_active == true ? 'active' : 'not_active';
        $this->gender = $user->gender;
    }

    public function update(int $id)
    {

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($id)],
            'is_active' => ['required'],
            'gender' => ['required']
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'is_active' => $validated['is_active'] === 'active' ? true : false,
            'gender' => $validated['gender']
        ]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $this->redirect(route('admin.dashboard.users', absolute: false), navigate: true);
    }

    public function changePassword(int $id)
    {
        $validated = $this->validate([
            'password' => ['required', 'string', Password::defaults(), 'confirmed'],
        ]);

        $user = User::find($id);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->redirect(route('admin.dashboard.users.edit', $user->id), navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.users.edit');
    }
}

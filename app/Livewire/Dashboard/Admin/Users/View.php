<?php

namespace App\Livewire\Dashboard\Admin\Users;

use App\Models\User;
use Livewire\Component;

class View extends Component
{
    public int $id;
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $is_active;
    public string $gender = '';

    public function mount() {

        $user = User::find($this->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_active = $user->is_active == true ? 'active' : 'not_active';
        $this->gender = $user->gender;
    }


    public function render()
    {
        return view('livewire.dashboard.admin.users.view');
    }
}

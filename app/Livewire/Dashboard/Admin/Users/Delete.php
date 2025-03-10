<?php

namespace App\Livewire\Dashboard\Admin\Users;

use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Delete extends Component
{
    public int $id;

    public function delete()
    {
        // User cannot delete himself through the list
        if(Auth::user()->id === $this->id){
            return redirect(route('admin.dashboard.users'));
        }

        $user = User::find($this->id);
        $roles = $user->getRoleNames()->toArray();
        
        if(in_array(\App\Helpers\Roles::STUDENT, $roles)) {
            // Check if user has a student profile
            $profile = Student::where(['user_id' => $this->id])->first();
            if($profile !== false) {
                $profile->delete();
            }
        }

        if(in_array(\App\Helpers\Roles::ADMINISTRATOR, $roles)) {
            // Check if user has an administrator profile
            $profile = Admin::where(['user_id' => $this->id])->first();
            if($profile !== null) {
                $profile->delete();
            }
        }

        // delete roles
        foreach($roles as $role) {
            $user->removeRole($role);
        }

        // delete users
        $user->delete();

        return $this->redirect(route('admin.dashboard.users'), true);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.users.delete');
    }
}

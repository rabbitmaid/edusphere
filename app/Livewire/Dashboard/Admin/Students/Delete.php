<?php

namespace App\Livewire\Dashboard\Admin\Students;

use App\Models\Student;
use Livewire\Component;

class Delete extends Component
{
    public int $id;

    public function delete()
    {
        $student = Student::find($this->id);
        $student->delete();
        return $this->redirect(route('admin.dashboard.students'), true);
    }

    
    public function render()
    {
        return view('livewire.dashboard.admin.students.delete');
    }
}

<?php

namespace App\Livewire\Dashboard\Admin\Students;

use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolClass;
use Illuminate\Support\Carbon;

class View extends Component
{
    public int $id;
    public string $user = '';
    public string $matricule = '';
    public string $schoolClass = '';
    public string $address = '';
    public string $dateOfBirth = '';
    public string $phone = '';
    public string $placeOfBirth = '';

    public function mount() {

        $student = Student::where(['id' => $this->id])->firstOrFail();
        $this->matricule = $student->matricule;
        $this->user = $student->user->name;
        $this->schoolClass = $student->class->id;
        $this->address = $student->address;
        $this->dateOfBirth = $student->date_of_birth;
        $this->phone = $student->phone;
        $this->placeOfBirth = $student->place_of_birth;
    }

    public function render()
    {
        $schoolClasses = SchoolClass::all();

        return view('livewire.dashboard.admin.students.view', [
            'schoolClasses' => $schoolClasses
        ]);
    }
}

<?php

namespace App\Livewire\Dashboard\Admin\Students;

use App\Models\User;
use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolClass;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class Edit extends Component
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

    public function update(int $id)
    {
        $validated = $this->validate([
            'schoolClass' => 'required',
            'address' => 'required',
            'dateOfBirth' => 'required',
            'placeOfBirth' => 'required',
            'phone' => 'required'
        ]);

        $student = Student::findOrFail($id);
        
       $update = $student->update([
            'class_id' => $validated['schoolClass'],
            'address' => $validated['address'],
            'date_of_birth' => $validated['dateOfBirth'],
            'place_of_birth' => $validated['placeOfBirth'],
            'phone' => $validated['phone'],
        ]);

        if($update) {
            $this->dispatch('saved');
        }

        $this->redirect(route('admin.dashboard.students', $student->id), navigate: true);
    }
    
    public function render()
    {
        $schoolClasses = SchoolClass::all();
        
        return view('livewire.dashboard.admin.students.edit', [
            'schoolClasses' => $schoolClasses
        ]);
    }
}

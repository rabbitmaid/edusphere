<?php

namespace App\Livewire\Dashboard\Admin\Students;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolClass;
use Illuminate\Support\Str;

class Create extends Component
{
    public string $user = '';
    public string $matricule = '';
    public string $schoolClass = '';
    public string $address = '';
    public string $dateOfBirth = '';
    public string $phone = '';
    public string $placeOfBirth = '';

    public function mount() {
        $year = Carbon::now()->year;

        do {
            $matricule = $year . Str::upper(Str::random(5));
        } while (Student::where('matricule', $matricule)->exists());

        $this->matricule = $matricule;
    }

    public function create()
    {
        $validated = $this->validate([
            'user' => 'required',
            'schoolClass' => 'required',
            'address' => 'required',
            'dateOfBirth' => 'required',
            'placeOfBirth' => 'required',
            'phone' => 'required'
        ]);

        $student = Student::create([
            'user_id' => $validated['user'],
            'matricule' => $this->matricule,
            'class_id' => $validated['schoolClass'],
            'address' => $validated['address'],
            'date_of_birth' => $validated['dateOfBirth'],
            'place_of_birth' => $validated['placeOfBirth'],
            'phone' => $validated['phone'],
        ]);

        $this->dispatch('saved');

        $this->redirect(route('admin.dashboard.students', absolute: false), navigate: true);
    }

    public function render()
    {
        $users = User::role('student')->get()->reject(
            fn ($user) => Student::where('user_id', $user->id)->exists()
        );

        $schoolClasses = SchoolClass::all();
        
        return view('livewire.dashboard.admin.students.create', [
            'users' => $users,
            'schoolClasses' => $schoolClasses
        ]);
    }
}

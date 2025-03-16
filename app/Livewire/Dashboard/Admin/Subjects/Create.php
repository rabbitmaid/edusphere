<?php

namespace App\Livewire\Dashboard\Admin\Subjects;

use App\Models\Subject;
use Livewire\Component;
use App\Models\SchoolClass;

class Create extends Component
{
    public string $name = '';
    public string $schoolClass = '';
    public string $coefficient = '';

    public function create()
    {
        $validated = $this->validate([
            'name' => 'required',
            'schoolClass' => 'required',
            'coefficient' => 'required'
        ]);

        $subject = Subject::create([
            'name' => $validated['name'],
            'class_id' => $validated['schoolClass'],
            'coefficient' => (int) $validated['coefficient']
        ]);

        $this->dispatch('saved');

        $this->redirect(route('admin.dashboard.subjects.create', absolute: false), navigate: true);
    }


    public function render()
    {
        $schoolClasses = SchoolClass::all();

        return view('livewire.dashboard.admin.subjects.create', [
            'schoolClasses' => $schoolClasses
        ]);
    }
}

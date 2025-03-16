<?php

namespace App\Livewire\Dashboard\Admin\Subjects;

use App\Models\Subject;
use Livewire\Component;
use App\Models\SchoolClass;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    public int $id;
    public string $name = '';
    public string $schoolClass = '';
    public string $coefficient = '';

    public function mount()
    {
        $subject = Subject::findOrFail($this->id);
        $this->name = $subject->name;
        $this->schoolClass = $subject->schoolClass->id;
        $this->coefficient = $subject->coefficient;
    }


    public function update()
    {
      
        $validated = $this->validate([
            'name' => 'required',
            'schoolClass' => 'required',
            'coefficient' => 'required'
        ]);

        $subject = Subject::findOrFail($this->id);

        $update = $subject->update([
            'name' => $validated['name'],
            'class_id' => $validated['schoolClass'],
            'coefficient' => (int) $validated['coefficient']
        ]);

        if($update) {
            $this->dispatch('saved'); 
        }


        $this->redirect(route('admin.dashboard.subjects.edit', $this->id), navigate: true);

    }

    public function render()
    {
        $schoolClasses = SchoolClass::all();

        return view('livewire.dashboard.admin.subjects.edit', [
            'schoolClasses' => $schoolClasses
        ]);
    }
}

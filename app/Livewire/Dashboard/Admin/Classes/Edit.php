<?php

namespace App\Livewire\Dashboard\Admin\Classes;

use App\Models\Cycle;
use App\Models\SchoolClass;
use Livewire\Component;

class Edit extends Component
{
    public int $id;
    public string $name = '';
    public string $cycle = '';

    public function mount()
    {
        $class = SchoolClass::find($this->id);
        $this->name = $class->name;
        $this->cycle = $class->cycle->id;
    }

    public function update(int $id)
    {

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'cycle' => ['required'],
        ]);

        $class = SchoolClass::find($this->id);

        $class->update([
            'name' => $validated['name'],
            'cycle_id' => $validated['cycle'],
        ]);

        $this->redirect(route('admin.dashboard.classes', absolute: false), navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.classes.edit', [
            'schoolCycles' => Cycle::all()
        ]);
    }
}

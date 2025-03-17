<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Support\Str;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $user = '';
    public string $matricule = '';
    public string $schoolClass = '';
    public string $address = '';
    public string $dateOfBirth = '';
    public string $phone = '';
    public string $placeOfBirth = '';
    public $allSchoolClasses;

    public function mount() {
        $year = \Carbon\Carbon::now()->year;

        do {
            $matricule = $year . Str::upper(Str::random(5));
        } while (Student::where('matricule', $matricule)->exists());

        $this->matricule = $matricule;

        $this->allSchoolClasses = SchoolClass::all();
    }

    /**
     * Handle an incoming registration request.
     */
    public function save(): void
    {
        $validated = $this->validate([
            'schoolClass' => 'required',
            'address' => 'required',
            'dateOfBirth' => 'required',
            'placeOfBirth' => 'required',
            'phone' => 'required'
        ]);

        $student = Student::create([
            'user_id' => auth()->user()->id,
            'matricule' => $this->matricule,
            'class_id' => $validated['schoolClass'],
            'address' => $validated['address'],
            'date_of_birth' => $validated['dateOfBirth'],
            'place_of_birth' => $validated['placeOfBirth'],
            'phone' => $validated['phone'],
        ]);

  
        $this->redirectIntended(default: route('student.dashboard', absolute: false), navigate: true);
        
        // $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header title="Create a Student Profile" description="Enter your details below to become a student" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="save" class="flex flex-col gap-6">

        <flux:field>
            <flux:select label="Select Class" wire:model='schoolClass'>
                <option selected disabled value="">Select Student Class</option>
                @foreach ($allSchoolClasses as $schoolClass)
                    <option value="{{ $schoolClass->id }}">{{ $schoolClass->name }}</option>
                @endforeach
            </flux:select>
        </flux:field>
    
        <flux:field>
            <flux:input label="Address" wire:model="address" placeholder="ex. Somewhere land" />
        </flux:field>
    
        <flux:field>
            <flux:input label="Place of Birth" wire:model="placeOfBirth" placeholder="ex. Homecity" />
        </flux:field>
    
        <flux:field>
            <flux:input type="date" label="Date of Birth" wire:model="dateOfBirth" placeholder="Date of Birth" />
        </flux:field>
    
        <flux:field>
            <flux:input type="phone" label="Phone Number" wire:model="phone" placeholder="620000000" />
        </flux:field>
    
        <flux:button variant="primary" type="submit" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Save</flux:button>
    
        <x-action-message on='saved' />
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        Already have an account?
        <flux:link :href="route('login')" wire:navigate>Log in</flux:link>
    </div>
</div>

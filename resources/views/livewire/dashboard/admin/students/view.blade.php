<form wire:submit.prevent=''>

    <flux:field class="mb-5">
        <flux:input label="Name" wire:model="user" placeholder="Student Name" readonly disabled />
    </flux:field>

    <flux:field class="mb-5">
        <flux:input label="Matricule" wire:model="matricule" placeholder="Student Matricule" readonly disabled />
    </flux:field>

    <flux:field class="mb-8">
        <flux:select label="Select Class" wire:model='schoolClass' readonly disabled>
            <option selected disabled value="">Select Student Class</option>
            @foreach ($schoolClasses as $schoolClass)
                <option value="{{ $schoolClass->id }}">{{ $schoolClass->name }}</option>
            @endforeach
        </flux:select>
    </flux:field>

    <flux:field class="mb-5">
        <flux:input label="Address" wire:model="address" placeholder="ex. Somewhere land"  readonly disabled/>
    </flux:field>

    <flux:field class="mb-5">
        <flux:input label="Place of Birth" wire:model="placeOfBirth" placeholder="ex. Homecity"  readonly disabled/>
    </flux:field>

    <flux:field class="mb-5">
        <flux:input type="date" label="Date of Birth" wire:model="dateOfBirth" placeholder="Date of Birth"  readonly disabled/>
    </flux:field>

    <flux:field class="mb-5">
        <flux:input type="phone" label="Phone Number" wire:model="phone" placeholder="620000000"  readonly disabled/>
    </flux:field>


</form>
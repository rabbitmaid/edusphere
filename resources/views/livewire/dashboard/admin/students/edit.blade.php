<form wire:submit.prevent='update({{ $id }})'>

    <flux:field class="mb-5">
        <flux:input label="Name" wire:model="user" placeholder="Student Name" readonly disabled />
    </flux:field>

    <flux:field class="mb-5">
        <flux:input label="Matricule" wire:model="matricule" placeholder="Student Matricule" readonly disabled />
    </flux:field>

    <flux:field class="mb-8">
        <flux:select label="Select Class" wire:model='schoolClass'>
            <option selected disabled value="">Select Student Class</option>
            @foreach ($schoolClasses as $schoolClass)
                <option value="{{ $schoolClass->id }}">{{ $schoolClass->name }}</option>
            @endforeach
        </flux:select>
    </flux:field>

    <flux:field class="mb-5">
        <flux:input label="Address" wire:model="address" placeholder="ex. Somewhere land" />
    </flux:field>

    <flux:field class="mb-5">
        <flux:input label="Place of Birth" wire:model="placeOfBirth" placeholder="ex. Homecity" />
    </flux:field>

    <flux:field class="mb-5">
        <flux:input type="date" label="Date of Birth" wire:model="dateOfBirth" placeholder="Date of Birth" />
    </flux:field>

    <flux:field class="mb-5">
        <flux:input type="phone" label="Phone Number" wire:model="phone" placeholder="620000000" />
    </flux:field>

    <flux:button variant="primary" type="submit" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Update</flux:button>

</form>
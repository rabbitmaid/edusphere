<form wire:submit.prevent='update'>
    <flux:field class="mb-5">
        <flux:input label="Name" wire:model="name" placeholder="Biology" />
    </flux:field>

    <flux:field class="mb-5">
        <flux:input type="number" min="1" label="Coefficient" wire:model="coefficient" placeholder="Coefficient" />
    </flux:field>

    <flux:field class="mb-8">
        <flux:select label="Select Class" wire:model='schoolClass'>
            <option selected disabled value="">Select Student Class</option>
            @foreach ($schoolClasses as $schoolClass)
                <option value="{{ $schoolClass->id }}">{{ $schoolClass->name }}</option>
            @endforeach
        </flux:select>
    </flux:field>


    <flux:button variant="primary" type="submit" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Update</flux:button>

    <x-action-message on='saved' />

</form>
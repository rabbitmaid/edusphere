<section>

    <section class="mb-10">
        <flux:heading size="lg" level="3" class="mb-5">Edit Class Details</flux:heading>

        <form wire:submit.prevent='update({{ $id }})'>
            <flux:field class="mb-5">
                <flux:input label="Name" wire:model="name" placeholder="John Smith" />
            </flux:field>

            <flux:field class="mb-8">
                <flux:select label="Cycle" wire:model='cycle'>
                    <option selected disabled value="">Select Class Cycle</option>

                    @foreach ($schoolCycles as  $schoolCycle)
                        <option value="{{ $schoolCycle->id }}" {{ $schoolCycle->id == $cycle ? 'selected': '' }}>{{ $schoolCycle->name }}</option>
                    @endforeach
                    
                </flux:select>
            </flux:field>


        
            <flux:button variant="primary" type="submit" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Update</flux:button>

            <x-action-message on='saved' />
        
        </form>
    
    </section>

</section>
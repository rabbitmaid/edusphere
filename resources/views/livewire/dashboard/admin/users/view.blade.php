<section>

    <section class="mb-10">
        <flux:heading size="lg" level="3" class="mb-5">Edit User Details</flux:heading>

        <form wire:submit.prevent='update({{ $id }})'>
            <flux:field class="mb-5">
                <flux:input label="Name" wire:model="name" placeholder="John Smith" readonly disabled />
            </flux:field>
        
            <flux:field class="mb-5">
                    <flux:label>Email</flux:label>
                    <flux:input wire:model="email" type="email" placeholder="example@email.com"  readonly disabled />
                    <flux:error name="email" />
            </flux:field>

            <flux:field class="mb-8">
                <flux:select label="Account" wire:model='is_active' readonly disabled>
                    <option selected disabled value="">Select visibility</option>
                    <option value="active" {{ $is_active == 'active' ? 'selected': '' }}>Active</option>
                    <option value="not_active" {{ $is_active == 'not_active' ? 'selected': '' }}>Not Active</option>
                    
                </flux:select>
            </flux:field>


            <flux:field class="mb-8">
                <flux:select label="Gender" wire:model='gender' readonly disabled>
                    <option selected disabled value="">Select gender</option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </flux:select>
            </flux:field>
        

        </form>
    
    </section>



</section>
<form wire:submit.prevent='update'>

    <flux:field class="mb-8">
        <flux:select label="Select Currency" wire:model='currency'>
            <option selected disabled value="">Select System Currency</option>
            <option value="XAF">FCFA</option>
        </flux:select>
    </flux:field>

    <flux:field class="mb-5">
        <flux:input label="Registration Fee" wire:model="registrationFee" placeholder="0.00" />
    </flux:field>

    <flux:button variant="primary" type="submit" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Update</flux:button>

    <x-action-message on='saved' />

</form>
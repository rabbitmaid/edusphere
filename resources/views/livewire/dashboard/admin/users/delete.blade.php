
{{-- <flux:menu.item variant="danger" icon="trash" wire:click='delete' class="cursor-pointer">Delete</flux:menu.item> --}}

<div wire:ignore>
    <flux:modal.trigger :name="'delete-profile-'.$id">
        <flux:button variant="danger" class="cursor-pointer">Delete</flux:button>
    </flux:modal.trigger>

    <flux:modal :name="'delete-profile-'.$id" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete user?</flux:heading>

                <flux:subheading>
                    <p>You're about to delete this user.</p>
                    <p>This action cannot be reversed.</p>
                </flux:subheading>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="danger" wire:click='delete' class="cursor-pointer">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>

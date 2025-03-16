<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <flux:heading size="xl" level="1">Edit Subject</flux:heading>
        <flux:subheading size="lg" class="mb-6">Modify existing subject details</flux:subheading>
        <flux:separator variant="subtle" />

        <div class="mt-5 w-full max-w-lg">
            <section class="w-full">
               <livewire:dashboard.admin.subjects.edit :id="$subject->id" />
            </section>
        </div>
    </div>
</x-layouts.app>

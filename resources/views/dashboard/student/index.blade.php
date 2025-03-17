<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div>
            <flux:heading size="xl" level="1" class="text-center md:text-start mb-3">Welcome</flux:heading>
            <flux:separator variant="subtle" />
        </div>

        <div class="grid auto-rows-min gap-4">

            <div class="relative overflow-hidden rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-neutral-200 dark:border-neutral-700 px-8 py-5">
                <flux:heading size="lg" level="3">{{ ucwords(auth()->user()->name) }}</flux:heading>
                <flux:subheading size="lg" class="mb-3">{{ auth()->user()->student->class->name }}</flux:subheading>
                <flux:heading size="xl" class="mb-1">{{ auth()->user()->student->matricule }}</flux:heading>
            </div>

        
        </div>

        
    </div>
</x-layouts.app>

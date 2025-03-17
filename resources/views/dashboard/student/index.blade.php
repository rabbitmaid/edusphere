<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div>
            <flux:heading size="xl" level="1" class="text-center md:text-start">Overview</flux:heading>
            <flux:subheading size="lg" class="mb-6">System Analytics</flux:subheading>
            <flux:separator variant="subtle" />
        </div>

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative overflow-hidden rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-neutral-200 dark:border-neutral-700 px-8 py-5 transition-transform ease-in-out 350ms hover:scale-95 cursor-pointer">
                <flux:heading size="lg" level="3">Total Admins</flux:heading>
                <flux:subheading size="lg" class="mb-3">Number of existing administrators</flux:subheading>
                <flux:heading size="xl" class="mb-1">{{ $totalAdmins ?? 0 }}</flux:heading>
            </div>

            <div class="relative overflow-hidden rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-neutral-200 dark:border-neutral-700 px-8 py-5 transition-transform ease-in-out 350ms hover:scale-95 cursor-pointer">
                <flux:heading size="lg" level="3">Total Students</flux:heading>
                <flux:subheading size="lg" class="mb-3">Number of existing students</flux:subheading>
                <flux:heading size="xl" class="mb-1">{{ $totalStudents ?? 0 }}</flux:heading>
            </div>

            <div class="relative overflow-hidden rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-neutral-200 dark:border-neutral-700 px-8 py-5 transition-transform ease-in-out 350ms hover:scale-95 cursor-pointer">
                <flux:heading size="lg" level="3">Total Subjects</flux:heading>
                <flux:subheading size="lg" class="mb-3">Number of Subjects in the system</flux:subheading>
                <flux:heading size="xl" class="mb-1">{{ $totalSubjects ?? 0 }}</flux:heading>
            </div>
          
        </div>

        
    </div>
</x-layouts.app>

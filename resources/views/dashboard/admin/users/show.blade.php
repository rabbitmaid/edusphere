<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <flux:heading size="xl" level="1">User details</flux:heading>
        <flux:subheading size="lg" class="mb-6">See all the details of the existing user</flux:subheading>
        <flux:separator variant="subtle" />

        <div class="mt-5 w-full max-w-lg">
            <section class="w-full grid grid-cols-3 gap-y-6">
                <p><span class="font-semibold">Name:</span> <br /> {{ $user->name }}</p>
                <p><span class="font-semibold">Email:</span> <br /> {{ $user->email }}</p>
                <p><span class="font-semibold">Gender:</span> <br /> {{ $user->gender }}</p>
            </section>
        </div>
    
    </div>
</x-layouts.app>

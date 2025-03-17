<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="flex flex-col md:flex-row items-center justify-between gap-3 md:gap-0">

            <div>
                <flux:heading size="xl" level="1" class="text-center md:text-start">All Subjects</flux:heading>
                <flux:subheading size="lg" class="mb-6">Fill marks for a subject</flux:subheading>
            </div>

            <div>
                <flux:button type="button" icon="arrow-uturn-left" wire:navigate='true' variant="primary" class="backBtn block uppercase text-xs font-semibold tracking-widest cursor-pointer">Back</flux:button>
            </div>

        </div>
        <flux:separator variant="subtle" />

        <div class="grid auto-rows-min gap-4 md:grid-cols-2 lg:grid-cols-4">

            @isset($subjects)

                @foreach ($subjects as $subject)

                    <a wire:navigate href="{{ route('admin.dashboard.marks.sequence.fill', [ $sequence->id, $class->id, $subject->id]) }}">
                        <div class="relative overflow-hidden rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-neutral-200 dark:border-neutral-700 px-8 py-5 transition-transform ease-in-out 350ms hover:scale-95 cursor-pointer">
                            <flux:heading size="lg" level="3" class="mb-2">{{ $subject->name }}</flux:heading>
                            <div>
                                <flux:badge color="lime">{{ $class->name }}</flux:badge> <flux:badge color="indigo">{{ $sequence->name }}</flux:badge>
                            </div>
                        </div>
                    </a>
                    
                @endforeach
                
            @endisset


            @if(count($subjects) == 0)
                <p>No Subjects Found</p>
            @endif
            
        </div>
    </div>
</x-layouts.app>

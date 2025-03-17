<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">


        <div class="flex flex-col md:flex-row items-center justify-between gap-3 md:gap-0">
     
            <div>
                <flux:heading size="xl" level="1" class="text-center md:text-start">All Sequences</flux:heading>
                <flux:subheading size="lg" class="mb-6">Fill marks for a sequence</flux:subheading>
             
            </div>
    
            <div>
                <flux:button type="button" icon="arrow-uturn-left" wire:navigate='true' variant="primary" class="backBtn block uppercase text-xs font-semibold tracking-widest cursor-pointer">Back</flux:button>
            </div>

        </div>
        <flux:separator variant="subtle" />


        <div class="grid auto-rows-min gap-4 md:grid-cols-2 lg:grid-cols-4">

            @isset($sequences)

                @foreach ($sequences as $sequence)

                    <a wire:navigate href="{{ route('admin.dashboard.marks.sequences.subjects', [ $sequence->id, $class->id]) }}">
                        <div class="relative overflow-hidden rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-neutral-200 dark:border-neutral-700 px-8 py-5 transition-transform ease-in-out 350ms hover:scale-95 cursor-pointer">
                            <flux:heading size="lg" level="3">{{ $class->name }} -  <flux:badge color="indigo" >{{ $sequence->name }}</flux:badge></flux:heading>
                            
                            <flux:subheading size="lg" class="mb-3">Fill the marks for this sequence</flux:subheading>
                        </div>
                    </a>
                    
                @endforeach
                
            @endisset

            @if(count($sequences) == 0)
                <p>No Sequences Found</p>
            @endif
            
        </div>
    </div>
</x-layouts.app>

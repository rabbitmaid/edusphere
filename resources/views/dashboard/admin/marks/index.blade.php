<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <div class="flex flex-col md:flex-row items-center justify-between gap-3 md:gap-0">
            <div>
                <flux:heading size="xl" level="1" class="text-center md:text-start">Fill Marks</flux:heading>
                <flux:subheading size="lg" class="mb-6">Manage marks for all existing classes</flux:subheading>
            </div>

            {{-- <div>
                <flux:button href="{{ route('admin.dashboard.students.create') }}" wire:navigate='true' variant="primary" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Add Student</flux:button>
            </div> --}}
        </div>
        <flux:separator variant="subtle" />


         <!--[if BLOCK]><![endif]-->
        <div class="relative overflow-x-auto sm:rounded-lg" wire:ignore>

            <table class="dt-table display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Cycle</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
    
                    @isset($classes)
    
                    @foreach($classes as $class)
                        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $class->name }}</td>
                            <td>{{ $class->cycle->name }}</td>
                            <td>
                                <flux:button href="{{ route('admin.dashboard.marks.sequences', $class->id) }}" wire:navigate> 
                                    <span>Fill Marks </span>
                                </flux:button>
                            </td>
                          
                        </tr>
    
                        
                    @endforeach
    
                @endisset
                   
            
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Cycle</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            
        </div>
        <!--[if ENDBLOCK]><![endif]-->

    </div>
</x-layouts.app>

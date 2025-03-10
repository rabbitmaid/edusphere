<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <div class="flex flex-col md:flex-row items-center justify-between gap-3 md:gap-0">
            <div>
                <flux:heading size="xl" level="1" class="text-center md:text-start">All Students</flux:heading>
                <flux:subheading size="lg" class="mb-6">Manage all existing students</flux:subheading>
            </div>

            <div>
                <flux:button href="{{ route('admin.dashboard.users.create') }}" wire:navigate='true' variant="primary" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Add Student</flux:button>
            </div>
        </div>
        <flux:separator variant="subtle" />


         <!--[if BLOCK]><![endif]-->
        <div class="relative overflow-x-auto sm:rounded-lg" wire:ignore>

            <table class="dt-table display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Matricule</th>
                        <th>Class</th>
                        <th>Address</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
    
                    @isset($students)
    
                    @foreach($students as $student)
                        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td></td>
                            <td></td>
                            <td>{{ $student->created_at->diffForHumans() }}</td>
                            <td class="flex items-center gap-2">
                                {{-- Admin cannot use this control on his or herself --}}
                                @if(auth()->user()->id !== $user->id)
                                    <flux:dropdown>
                                    
                                            <flux:button icon-trailing="chevron-down"  class="cursor-pointer">
                                                <flux:icon.adjustments-horizontal />
                                            </flux:button>
                                
                                    
                                            <flux:menu>
                                                @can('update users')
                                                    <flux:menu.item href="{{ route('admin.dashboard.users.edit', $user->id) }}" wire:navigate='true'  icon="pencil" class="cursor-pointer">Edit</flux:menu.item>
                                                  
                                                @endcan

                                                {{-- Do not change role of client
                                                @if(!$user->hasRole('client'))
                                                    @can('manage users roles')
                                                    <flux:menu.separator />
                                                    
                                                        {{-- <flux:menu.item href="{{ route('admin.dashboard.users.role', $user->id) }}" wire:navigate='true'   icon="finger-print" class="cursor-pointer">Roles</flux:menu.item>
                                                        <flux:menu.separator /> --}}

                                                    {{-- @endcan
                                                @endif--}}

                                            </flux:menu>
                                    
                                    </flux:dropdown>
                                        
                                @endif

                                @can('delete users')
                                    <livewire:dashboard.admin.users.delete :id="$user->id" />
                                @endcan
                            </td>
                        </tr>
    
                        
                    @endforeach
    
                @endisset
                   
            
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Matricule</th>
                        <th>Class</th>
                        <th>Address</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            
        </div>
        <!--[if ENDBLOCK]><![endif]-->

    </div>
</x-layouts.app>

<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="flex flex-col md:flex-row items-center justify-between gap-3 md:gap-0">
            <div>
                <flux:heading size="xl" level="1" class="text-center md:text-start">All Students in
                    {{ $class->name }}</flux:heading>
                <flux:subheading size="lg" class="mb-6">Manage all existing students</flux:subheading>
            </div>

            <div>
                <flux:button href="{{ route('admin.dashboard.students.create') }}" wire:navigate='true' variant="primary"
                    class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Get Class List
                </flux:button>
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

                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->user->name }}</td>
                                <td>{{ $student->matricule }}</td>
                                <td>{{ $student->class->name }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->created_at->diffForHumans() }}</td>
                                <td class="flex items-center gap-2">

                                    <flux:dropdown>

                                        <flux:button icon-trailing="chevron-down" class="cursor-pointer">
                                            <flux:icon.adjustments-horizontal />
                                        </flux:button>


                                        <flux:menu>
                                            @can('update students')
                                                <flux:menu.item
                                                    href="{{ route('admin.dashboard.students.edit', $student->id) }}"
                                                    wire:navigate='true' icon="pencil" class="cursor-pointer">Edit
                                                </flux:menu.item>
                                            @endcan

                                            @can('view students')
                                                <flux:menu.separator />
                                                <flux:menu.item href="{{ route('admin.dashboard.students.show', $student->id) }}"
                                                    wire:navigate='true' icon="eye" class="cursor-pointer">View
                                                </flux:menu.item>
                                            @endcan

                                        </flux:menu>

                                    </flux:dropdown>



                                    @can('delete students')
                                    <livewire:dashboard.admin.students.delete :id="$student->id" />
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

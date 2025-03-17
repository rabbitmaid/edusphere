<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="flex flex-col md:flex-row items-center justify-between gap-3 md:gap-0">
            <div>
                <flux:heading size="xl" level="1" class="text-center md:text-start">Fill {{ $sequence->name }} Marks for Students in {{ $class->name }} - {{ $subject->name }}</flux:heading>
                <flux:subheading size="lg" class="mb-6">Fill marks for all existing students</flux:subheading>
            </div>

            <div>
                <flux:button type="button" icon="arrow-uturn-left" wire:navigate='true' variant="primary" class="backBtn block uppercase text-xs font-semibold tracking-widest cursor-pointer">Back</flux:button>
            </div>

        </div>
        <flux:separator variant="subtle" />

        <form action="{{ route('admin.dashboard.marks.sequence.fill.store') }}" method="POST">
            @csrf

            <input type="hidden" name="class_id" value="{{ $class->id }}" />
            <input type="hidden" name="subject_id" value="{{ $subject->id }}" />
            <input type="hidden" name="sequence_id" value="{{ $sequence->id }}" />

            <!--[if BLOCK]><![endif]-->
            <div class="relative overflow-x-auto sm:rounded-lg" wire:ignore>

                <table class="dt-table display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Matricule</th>
                            <th>Class</th>
                            <th>Score</th>
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
                                    <td>
                                        <input type="text" class="w-16 h-8 border border-gray-700 dark:border-gray-500 text-gray-900 dark:text-white px-5 rounded-lg" value="{{ $student->getMark($sequence->id, $subject->id) }}" name="score[{{ $student->id }}]">
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
                            <th>Score</th>
                        </tr>
                    </tfoot>
                </table>

                <flux:button type="submit" variant="primary" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer mt-3">Update</flux:button>
                
            </div>
            <!--[if ENDBLOCK]><![endif]-->
       </form>

    </div>
</x-layouts.app>

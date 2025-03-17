<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div>
            <flux:heading size="xl" level="1" class="text-center md:text-start mb-3">Welcome</flux:heading>
            <flux:separator variant="subtle" />
        </div>

        <div class="grid auto-rows-min md:grid-cols-2 gap-4">

            <div
                class="relative overflow-hidden rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-neutral-200 dark:border-neutral-700 px-8 py-5">
                <flux:heading size="lg" level="3">{{ ucwords(auth()->user()->name) }}</flux:heading>
                <flux:subheading size="lg" class="mb-3">{{ auth()->user()->student->class->name }}
                </flux:subheading>
                <flux:heading size="xl" class="mb-1">{{ auth()->user()->student->matricule }}</flux:heading>
            </div>

            <div
                class="relative overflow-hidden rounded-xl bg-zinc-50 dark:bg-zinc-900 border border-neutral-200 dark:border-neutral-700 px-8 py-5 transition-transform ease-in-out 350ms hover:scale-95 cursor-pointer">
                <flux:heading size="lg" level="3">Total Transaction Amount</flux:heading>
                <flux:subheading size="lg" class="mb-3">Successful transactions</flux:subheading>
                <flux:heading size="xl" class="mb-1">
                    <flux:badge color="indigo"> {{ $totalTransaction ?? 0 }} {{ $currency ?? '' }} </flux:badge>
                </flux:heading>
            </div>


        </div>


        <div class="">
            <h3 class="mb-5">Your Transactions</h3>

            <!--[if BLOCK]><![endif]-->
            <div class="relative overflow-x-auto sm:rounded-lg" wire:ignore>

                <table class="dt-table display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Reference</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        @isset($transactions)

                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->reference }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>{{ $transaction->amount }} {{ $transaction->currency }}</td>
                                    <td>
                                        @if ($transaction->status == 'initiated')
                                            <flux:badge color="gray" class="uppercase text-xs">Initiated</flux:badge>
                                        @endif

                                        @if ($transaction->status == 'success')
                                            <flux:badge color="green" class="uppercase text-xs">Success</flux:badge>
                                        @endif

                                        @if ($transaction->status == 'failed')
                                            <flux:badge color="red" class="uppercase text-xs">Failed</flux:badge>
                                        @endif

                                    </td>

                                    <td>{{ $transaction->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach

                        @endisset


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Reference</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <!--[if ENDBLOCK]><![endif]-->


        </div>


    </div>
</x-layouts.app>

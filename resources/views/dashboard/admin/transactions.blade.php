<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <div class="flex flex-col md:flex-row items-center justify-between gap-3 md:gap-0">
            <div>
                <flux:heading size="xl" level="1" class="text-center md:text-start">All Transactions</flux:heading>
                <flux:subheading size="lg" class="mb-6">Manage all existing transactions</flux:subheading>
            </div>

            <div>
                <flux:button type="button" icon="arrow-uturn-left" wire:navigate='true' variant="primary" class="backBtn block uppercase text-xs font-semibold tracking-widest cursor-pointer">Back</flux:button>
            </div>
        </div>
        <flux:separator variant="subtle" />


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
    
                    @foreach($transactions as $transaction)
                        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->reference }}</td>
                            <td>{{ $transaction->type }}</td>
                            <td>{{ $transaction->amount }} {{ $transaction->currency }}</td>
                            <td>
                                @if($transaction->status == "initiated")
                                    <flux:badge color="gray" class="uppercase text-xs">Initiated</flux:badge>
                                @endif

                                @if($transaction->status == "success")
                                    <flux:badge color="green" class="uppercase text-xs">Success</flux:badge>
                                @endif

                                @if($transaction->status == "failed")
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
</x-layouts.app>

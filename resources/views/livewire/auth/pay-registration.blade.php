<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\SystemSetting;
use App\Models\Transaction;
use Illuminate\Support\Str;
use MeSomb\MeSomb;
use MeSomb\Util\RandomGenerator;
use MeSomb\Exception\ServerException;
use MeSomb\Operation\PaymentOperation;
use App\Events\RegistrationPaid;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $phoneNumber = '';
    public string $service = '';
    public string $registrationFee = '';
    public string $currency = '';

    public function mount()
    {
        $this->registrationFee = SystemSetting::registrationFee();
        $this->currency = SystemSetting::currency();
    }

    /**
     * Handle an incoming registration request.
     */
    public function pay(): void
    {
        $validated = $this->validate([
            'phoneNumber' => 'required',
            'service' => 'required',
        ]);

        $reference = Str::upper(Str::random(20));

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'reference' => $reference,
            'type' => 'registration',
            'amount' => $this->registrationFee,
            'currency' => $this->currency,
            'status' => 'initiated'
        ]);


        try {
            $client = new PaymentOperation(env('MESOMB_APP_KEY'), env('MESOMB_ACCESS_KEY'), env('MESOMB_SECRET_KEY'));
            MeSomb::setVerifySslCerts(true);

        
            $response = $client->makeCollect([
                'amount' => (float) $this->registrationFee,
                'service' => $this->service,
                'payer' => $this->phoneNumber,
                'date' => new \DateTime(),
                'nonce' => RandomGenerator::nonce(),
                'country' => 'CM',
                'currency' => 'XAF',
                'feesIncluded' => true,
                'trxID' => $reference,
            ]);

            if ($response->isTransactionSuccess()) {
                
                Transaction::where(['reference' => $reference])->update([
                    'status' => 'success'
                ]);

                Auth::user()->student->update([
                    'is_registered' => true
                ]);

                $transaction = Transaction::where(['reference' => $reference])->first();
                $user = Auth::user();

                event(new RegistrationPaid($user, $transaction));

                $this->redirectIntended(default: route('student.dashboard', absolute: false), navigate: true);

            } else {
                Transaction::where(['reference' => $reference])->update([
                    'status' => 'failed'
                ]);  

                $this->redirectRoute('register.student.pay', navigate: true);
            }
        } catch (\ArgumentCountError $e) {
            $message = 'Payment Failed! Refresh and Try Again, Might be one of the reasons, Insufficient funds, Wrong Secret Code, Timeout, Wrong Payment Service';

            Transaction::where(['reference' => $reference])->update([
                    'status' => 'failed'
            ]);  
            
            session()->flash('status', $e->getMessage());
            
            $this->redirectRoute('register.student.pay', navigate: true);
        } 
        catch (ServerException $e) {
            $message = 'Payment Failed! Refresh and Try Again, Might be one of the reasons, Insufficient funds, Wrong Secret Code, Timeout, Wrong Payment Service';

            Transaction::where(['reference' => $reference])->update([
                    'status' => 'failed'
            ]);  

            session()->flash('status', $e->getMessage());
            $this->redirectRoute('register.student.pay', navigate: true);
        }
        catch (\Exception $e) {
            $message = 'Payment Failed! Refresh and Try Again, Might be one of the reasons, Insufficient funds, Wrong Secret Code, Timeout, Wrong Payment Service';

            Transaction::where(['reference' => $reference])->update([
                    'status' => 'failed'
            ]);  

            session()->flash('status', $e->getMessage());
            $this->redirectRoute('register.student.pay', navigate: true);
        } 
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header title="Pay Registration Fee"
        description="Pay the registration fee to become fully registered as a student." />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="pay" class="flex flex-col gap-6">

        <flux:field>
            <flux:input type="text" label="Phone Number" wire:model="phoneNumber" placeholder="620000000" />
        </flux:field>

        <flux:field>
            <flux:select label="Select Service" wire:model='service'>
                <option selected disabled value="">Select Payment Service</option>
                <option value="MTN">MTN Mobile Money</option>
                <option value="Orange">Orange Money</option>
            </flux:select>
        </flux:field>


        <p>Registration Fee: {{ $registrationFee }} {{ $currency }}</p>

        <flux:button variant="primary" type="submit"
            class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Pay</flux:button>

        <x-action-message on='saved' />
    </form>

</div>

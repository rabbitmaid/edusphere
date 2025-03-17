<?php

namespace App\Livewire\Dashboard\Admin;

use App\Models\SystemSetting;
use Livewire\Component;

class Settings extends Component
{
    public string $currency = '';
    public string $registrationFee = '';

    public function mount()
    {
        $this->currency = SystemSetting::where(['name' => 'currency'])->first()->value;
        $this->registrationFee = SystemSetting::where(['name' => 'registration_fee'])->first()->value;
    }

    public function update()
    {
       $validated = $this->validate([
            'currency' => 'required',
            'registrationFee' => ['required', 'numeric', 'min:1']
        ]);

        
        $settings = SystemSetting::all();

        foreach($settings as $setting) {

            if($setting->name == 'registration_fee') {
                $setting->update([
                    'value' => $validated['registrationFee']
                ]);
            }

            if($setting->name == 'currency') {
                $setting->update([
                    'value' => $validated['currency']
                ]);
            }
        }

        $this->dispatch('saved');

        $this->redirect(route('admin.dashboard.settings', absolute: false), navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.settings');
    }
}

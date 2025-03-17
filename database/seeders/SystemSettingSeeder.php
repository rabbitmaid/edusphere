<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['name' => 'registration_fee', 'value' => '2'],
            ['name' => 'currency', 'value' => 'XAF']
        ];

        foreach($settings as $setting) {
            SystemSetting::firstOrCreate($setting);
        }
    }
}

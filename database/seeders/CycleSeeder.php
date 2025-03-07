<?php

namespace Database\Seeders;

use App\Models\Cycle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cycles = [
            ['name' => 'First Cycle'],
            ['name' => 'Second Cycle']
        ];

        foreach($cycles as $cycle) {
            Cycle::firstOrCreate([
                'name' => $cycle['name']
            ]);
        } 
    }
}

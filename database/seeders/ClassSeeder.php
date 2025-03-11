<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cycles = DB::table('cycles')->pluck('id', 'name');

        $classes = [
            ['name' => 'Form 1', 'cycle_id' => $cycles['First Cycle']],
            ['name' => 'Form 2', 'cycle_id' => $cycles['First Cycle']],
            ['name' => 'Form 3', 'cycle_id' => $cycles['First Cycle']],
            ['name' => 'Form 4', 'cycle_id' => $cycles['First Cycle']],
            ['name' => 'Form 5', 'cycle_id' => $cycles['First Cycle']],
            ['name' => 'Lower Sixth', 'cycle_id' => $cycles['Second Cycle']],
            ['name' => 'Upper Sixth', 'cycle_id' => $cycles['Second Cycle']]
        ];

        foreach($classes as $class) {
            SchoolClass::firstOrCreate([
                "name" => $class['name'],
                "cycle_id" => $class['cycle_id']
            ]);
        }
    }
}

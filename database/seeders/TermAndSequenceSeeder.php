<?php

namespace Database\Seeders;

use App\Models\Sequence;
use App\Models\Term;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TermAndSequenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $year = date('Y');

        $sequences = [
            ['name' => '1st Sequence', 'term' => 'First Term', 'academic_year' => $year ],
            ['name' => '2nd Sequence', 'term' => 'First Term', 'academic_year' => $year ],
            ['name' => '3rd Sequence', 'term' => 'Second Term', 'academic_year' => $year ],
            ['name' => '4th Sequence', 'term' => 'Second Term', 'academic_year' => $year ],
            ['name' => '5th Sequence', 'term' => 'Third Term', 'academic_year' => $year ],
            ['name' => '6th Sequence', 'term' => 'Third Term', 'academic_year' => $year ]
        ];

        foreach ($sequences as $sequence) {
            Sequence::firstOrCreate([
                'name' => $sequence['name'],
                'term' => $sequence['term'],
                'academic_year' => $sequence['academic_year']
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Mark;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['student_id' => 1, 'subject_id' => 1, 'logo' => null],
            ['student_id' => 2, 'subject_id' => 1, 'logo' => null],
            ['student_id' => 3, 'subject_id' => 1, 'logo' => null],
            ['student_id' => 4, 'subject_id' => 1, 'logo' => null],
            ['student_id' => 5, 'subject_id' => 1, 'logo' => null],
        ];

        foreach ($items as $item) {
            $mark = new Mark();
            $mark->student_id = $item['student_id'];
            $mark->subject_id = $item['subject_id'];
            $mark->mark = rand(1, 5); // Random mark between 1 and 5
            $mark->date = Carbon::now()->subDays(rand(1, 180))->format('Y-m-d H:i:s'); // Random date within the last 180 days
            $mark->logo = $item['logo'];
            $mark->save();
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Osztaly;
use App\Models\Classes_Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class MarkSeeder extends Seeder
{
    public function run(): void
    {
        $classes2025 = Osztaly::where('year', 2025)->pluck('id');

        $students2025 = Student::whereIn('class_id', $classes2025)->get();

        foreach ($students2025 as $student) {
            $subjectIds = Classes_Subject::where('class_id', $student->class_id)
                ->pluck('subject_id')
                ->toArray();

            if (empty($subjectIds)) {
                continue; 
            }

            $marksToGenerate = rand(3, 5);

            for ($i = 0; $i < $marksToGenerate; $i++) {
                Mark::create([
                    'student_id' => $student->id,
                    'subject_id' => $subjectIds[array_rand($subjectIds)],
                    'mark' => rand(1, 5),
                    'date' => Carbon::now()->toDateString(), 
                ]);
            }
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
            $mark->mark = rand(1, 5); 
            $mark->date = Carbon::now()->subDays(rand(1, 180))->format('Y-m-d H:i:s'); 
            $mark->logo = $item['logo'];
            $mark->save();
        }
    }
}
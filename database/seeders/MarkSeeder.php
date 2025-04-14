<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Osztaly;
use App\Models\Classes_Subject;
use Carbon\Carbon;

class MarkSeeder extends Seeder
{
    public function run(): void
    {
        // Csak a 2025-ös osztályok ID-i
        $classes2025 = Osztaly::where('year', 2025)->pluck('id');

        // Az ezekhez tartozó tanulók
        $students2025 = Student::whereIn('class_id', $classes2025)->get();

        foreach ($students2025 as $student) {
            // Az osztályához tartozó tantárgyak
            $subjectIds = Classes_Subject::where('class_id', $student->class_id)
                ->pluck('subject_id')
                ->toArray();

            if (empty($subjectIds)) {
                continue; // Ha nincs tantárgy, ugrunk
            }

            // Generáljunk 3-5 jegyet minden tanulónak
            $marksToGenerate = rand(3, 5);

            for ($i = 0; $i < $marksToGenerate; $i++) {
                Mark::create([
                    'student_id' => $student->id,
                    'subject_id' => $subjectIds[array_rand($subjectIds)],
                    'mark' => rand(1, 5),
                    'date' => Carbon::now()->toDateString(), // mai dátum
                ]);
            }
        }
    }
}
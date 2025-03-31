<?php

namespace Database\Seeders;

use App\Models\Classes_Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Class_SubjectSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 48; $i++) {
            for($j = 1; $j <= 7; $j++) {
                $ok = new Classes_Subject();
                $ok->class_id = $i;
                if($i%2 == 0) {
                    if($j <= 3) {
                        $ok->subject_id = $j;
                    }
                    if($j == 4) {
                        $ok->subject_id = $j+2;
                    }
                    if($j > 4) {
                        $ok->subject_id = $j+3;
                    }
                }
                else {
                    $ok->subject_id = $j;
                }
                $ok->save();
            }
        }
    }
}

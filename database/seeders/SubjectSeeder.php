<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{

    const ITEMS = [
        'Magyar irodalom',
        'Matematika',
        'Történelem',
        'Kémia',
        'Biológia',
        'Angol nyelv',
        'Földrajz',
        'Fizika',
        'Informatika',
        'Testnevelés',
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::ITEMS as $item) {
            $subject = new Subject();
	        $subject->name = $item;
            $subject->save();
        }
    }
}

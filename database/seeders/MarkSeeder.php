<?php

namespace Database\Seeders;

use App\Models\Mark;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarkSeeder extends Seeder
{

    const ITEMS = [
        '1',
        '2',
        '3',
        '4',
        '5',
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::ITEMS as $item) {
            $mark = new Mark();
	        $mark->name = $item;
            $mark->save();
        }
    }
}

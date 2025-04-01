<?php

namespace Database\Seeders;

use App\Models\Osztaly;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{

    const ITEMS = [
        '9A',
        '9B',
        '9C',
        '10A',
        '10B',
        '10C',
        '11A',
        '11B',
        '11C',
        '12A',
        '12B',
        '12C',
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 2022; $i <= 2025; $i++) {
            foreach (self::ITEMS as $item) {
                $class = new Osztaly();
                $class->name = $item;
                $class->year = "$i";
                $class->save();
            }
        }
        
    }
}

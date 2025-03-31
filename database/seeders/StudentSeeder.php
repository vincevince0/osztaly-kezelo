<?php

namespace Database\Seeders;

use App\Models\Osztaly;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{

    const ITEMS2022 = [
        '9A' => [['Nagy Ferenc', 'F'], ['Kovács Péter', 'F'], ['Szabó Anna', 'N'], ['Tóth László', 'F'], ['Horváth Zita', 'N']],
        '9B' => [['Molnár István', 'F'], ['Kiss Júlia', 'N'], ['Balogh Márk', 'F'], ['Farkas Eszter', 'N'], ['Varga Dénes', 'F']],
        '9C' => [['Papp Bence', 'F'], ['Juhász Nóra', 'N'], ['Takács Levente', 'F'], ['Németh Sára', 'N'], ['Simon Áron', 'F']],
        '10A' => [['Fekete Katalin', 'N'], ['Kerekes Tamás', 'F'], ['Sipos Veronika', 'N'], ['Gál Dávid', 'F'], ['Bognár Emese', 'N']],
        '10B' => [['Borbély Máté', 'F'], ['Pálfi Lívia', 'N'], ['Vass Gergely', 'F'], ['Sárközi Zsófia', 'N'], ['Keresztes Balázs', 'F']],
        '10C' => [['Szilágyi Dóra', 'N'], ['Dudás Norbert', 'F'], ['Illés Lilla', 'N'], ['Veres Attila', 'F'], ['Hegedűs Petra', 'N']],
        '11A' => [['Csabai Zoltán', 'F'], ['Oláh Bettina', 'N'], ['Lukács Krisztián', 'F'], ['Barta Regina', 'N'], ['Medgyesi Ádám', 'F']],
        '11B' => [['Somogyi László', 'F'], ['Novák Vivien', 'N'], ['Kelemen Bálint', 'F'], ['Hoffmann Laura', 'N'], ['Pataki András', 'F']],
        '11C' => [['Kovács Zsombor', 'F'], ['Boros Zita', 'N'], ['Tamás Gergely', 'F'], ['Vincze Lili', 'N'], ['Török Máté', 'F']],
        '12A' => [['Szűcs Dominik', 'F'], ['Győri Réka', 'N'], ['Fehér Botond', 'F'], ['Orosz Kitti', 'N'], ['Rácz Ákos', 'F']],
        '12B' => [['Major Brigitta', 'N'], ['Szalai Erik', 'F'], ['Bíró Evelin', 'N'], ['Vincze Balázs', 'F'], ['Tóth Szandra', 'N']],
        '12C' => [['Barna Richárd', 'F'], ['Jenei Nóra', 'N'], ['Király Gábor', 'F'], ['Lantos Emese', 'N'], ['Székely Zoltán', 'F']],
    ];

    const ITEMS2023 = [
        '9A' => [['Farkas Kristóf', 'F'], ['Lukács Enikő', 'N'], ['Balla Máté', 'F'], ['Tóth Eszter', 'N'], ['Kovács Dávid', 'F']],
        '9B' => [['Sándor Tamás', 'F'], ['Jónás Bianka', 'N'], ['Kerekes Dávid', 'F'], ['Nagy Veronika', 'N'], ['Molnár Bence', 'F']],
        '9C' => [['Bodnár Zsolt', 'F'], ['Mészáros Réka', 'N'], ['Gergely Zoltán', 'F'], ['Kiss Adrienn', 'N'], ['Fekete Márk', 'F']],
        '10A' => [['Nagy Ferenc', 'F'], ['Kovács Péter', 'F'], ['Szabó Anna', 'N'], ['Tóth László', 'F'], ['Horváth Zita', 'N']],
        '10B' => [['Molnár István', 'F'], ['Kiss Júlia', 'N'], ['Balogh Márk', 'F'], ['Farkas Eszter', 'N'], ['Varga Dénes', 'F']],
        '10C' => [['Papp Bence', 'F'], ['Juhász Nóra', 'N'], ['Takács Levente', 'F'], ['Németh Sára', 'N'], ['Simon Áron', 'F']],
        '11A' => [['Fekete Katalin', 'N'], ['Kerekes Tamás', 'F'], ['Sipos Veronika', 'N'], ['Gál Dávid', 'F'], ['Bognár Emese', 'N']],
        '11B' => [['Borbély Máté', 'F'], ['Pálfi Lívia', 'N'], ['Vass Gergely', 'F'], ['Sárközi Zsófia', 'N'], ['Keresztes Balázs', 'F']],
        '11C' => [['Szilágyi Dóra', 'N'], ['Dudás Norbert', 'F'], ['Illés Lilla', 'N'], ['Veres Attila', 'F'], ['Hegedűs Petra', 'N']],
        '12A' => [['Csabai Zoltán', 'F'], ['Oláh Bettina', 'N'], ['Lukács Krisztián', 'F'], ['Barta Regina', 'N'], ['Medgyesi Ádám', 'F']],
        '12B' => [['Somogyi László', 'F'], ['Novák Vivien', 'N'], ['Kelemen Bálint', 'F'], ['Hoffmann Laura', 'N'], ['Pataki András', 'F']],
        '12C' => [['Kovács Zsombor', 'F'], ['Boros Zita', 'N'], ['Tamás Gergely', 'F'], ['Vincze Lili', 'N'], ['Török Máté', 'F']],
    ];
    const ITEMS2024 = [
        '9A' => [['Török Gergely', 'F'], ['Varga Lilla', 'N'], ['Szabó Norbert', 'F'], ['Kis Patrícia', 'N'], ['Barta Levente', 'F']],
        '9B' => [['Oláh Máté', 'F'], ['Fekete Zsófia', 'N'], ['Horváth Dániel', 'F'], ['Jakab Lili', 'N'], ['Sipos Kristóf', 'F']],
        '9C' => [['Kerekes Ádám', 'F'], ['Németh Viktória', 'N'], ['Molnár Botond', 'F'], ['Kovács Noémi', 'N'], ['Tóth Dominik', 'F']],
        '10A' => [['Farkas Kristóf', 'F'], ['Lukács Enikő', 'N'], ['Balla Máté', 'F'], ['Tóth Eszter', 'N'], ['Kovács Dávid', 'F']],
        '10B' => [['Sándor Tamás', 'F'], ['Jónás Bianka', 'N'], ['Kerekes Dávid', 'F'], ['Nagy Veronika', 'N'], ['Molnár Bence', 'F']],
        '10C' => [['Bodnár Zsolt', 'F'], ['Mészáros Réka', 'N'], ['Gergely Zoltán', 'F'], ['Kiss Adrienn', 'N'], ['Fekete Márk', 'F']],
        '11A' => [['Nagy Ferenc', 'F'], ['Kovács Péter', 'F'], ['Szabó Anna', 'N'], ['Tóth László', 'F'], ['Horváth Zita', 'N']],
        '11B' => [['Molnár István', 'F'], ['Kiss Júlia', 'N'], ['Balogh Márk', 'F'], ['Farkas Eszter', 'N'], ['Varga Dénes', 'F']],
        '11C' => [['Papp Bence', 'F'], ['Juhász Nóra', 'N'], ['Takács Levente', 'F'], ['Németh Sára', 'N'], ['Simon Áron', 'F']],
        '12A' => [['Fekete Katalin', 'N'], ['Kerekes Tamás', 'F'], ['Sipos Veronika', 'N'], ['Gál Dávid', 'F'], ['Bognár Emese', 'N']],
        '12B' => [['Borbély Máté', 'F'], ['Pálfi Lívia', 'N'], ['Vass Gergely', 'F'], ['Sárközi Zsófia', 'N'], ['Keresztes Balázs', 'F']],
        '12C' => [['Szilágyi Dóra', 'N'], ['Dudás Norbert', 'F'], ['Illés Lilla', 'N'], ['Veres Attila', 'F'], ['Hegedűs Petra', 'N']],
    ];

    const ITEMS2025 = [
        '9A' => [['Szabó Ákos', 'F'], ['Kiss Zoltán', 'F'], ['Varga Boglárka', 'N'], ['Tóth Gábor', 'F'], ['Molnár Nikolett', 'N']],
        '9B' => [['Horváth Patrik', 'F'], ['Balogh Dóra', 'N'], ['Fekete Levente', 'F'], ['Kerekes Laura', 'N'], ['Juhász Máté', 'F']],
        '9C' => [['Németh Zsombor', 'F'], ['Bíró Petra', 'N'], ['Sipos Áron', 'F'], ['Takács Evelin', 'N'], ['Simon Norbert', 'F']],
        '10A' => [['Török Gergely', 'F'], ['Varga Lilla', 'N'], ['Szabó Norbert', 'F'], ['Kis Patrícia', 'N'], ['Barta Levente', 'F']],
        '10B' => [['Oláh Máté', 'F'], ['Fekete Zsófia', 'N'], ['Horváth Dániel', 'F'], ['Jakab Lili', 'N'], ['Sipos Kristóf', 'F']],
        '10C' => [['Kerekes Ádám', 'F'], ['Németh Viktória', 'N'], ['Molnár Botond', 'F'], ['Kovács Noémi', 'N'], ['Tóth Dominik', 'F']],
        '11A' => [['Farkas Kristóf', 'F'], ['Lukács Enikő', 'N'], ['Balla Máté', 'F'], ['Tóth Eszter', 'N'], ['Kovács Dávid', 'F']],
        '11B' => [['Sándor Tamás', 'F'], ['Jónás Bianka', 'N'], ['Kerekes Dávid', 'F'], ['Nagy Veronika', 'N'], ['Molnár Bence', 'F']],
        '11C' => [['Bodnár Zsolt', 'F'], ['Mészáros Réka', 'N'], ['Gergely Zoltán', 'F'], ['Kiss Adrienn', 'N'], ['Fekete Márk', 'F']],
        '12A' => [['Nagy Ferenc', 'F'], ['Kovács Péter', 'F'], ['Szabó Anna', 'N'], ['Tóth László', 'F'], ['Horváth Zita', 'N']],
        '12B' => [['Molnár István', 'F'], ['Kiss Júlia', 'N'], ['Balogh Márk', 'F'], ['Farkas Eszter', 'N'], ['Varga Dénes', 'F']],
        '12C' => [['Papp Bence', 'F'], ['Juhász Nóra', 'N'], ['Takács Levente', 'F'], ['Németh Sára', 'N'], ['Simon Áron', 'F']],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::ITEMS2022 as $key => $vmi)
        {
            foreach ($vmi as $item) 
            {
                $classes = Osztaly::where(['name' => $key])->where(['year'=>2022])->first();
                $students = new Student();
                $students->name = $item[0];
                $students->gender = $item[1];
                $students->class_id = $classes->id;
                $students->save();
            }
        }
        foreach (self::ITEMS2023 as $key => $vmi)
        {
            foreach ($vmi as $item) 
            {
                $classes = Osztaly::where(['name' => $key])->where(['year'=>2023])->first();
                $students = new Student();
                $students->name = $item[0];
                $students->gender = $item[1];
                $students->class_id = $classes->id;
                $students->save();
            }
        }
        foreach (self::ITEMS2024 as $key => $vmi)
        {
            foreach ($vmi as $item) 
            {
                $classes = Osztaly::where(['name' => $key])->where(['year'=>2024])->first();
                $students = new Student();
                $students->name = $item[0];
                $students->gender = $item[1];
                $students->class_id = $classes->id;
                $students->save();
            }
        }
        foreach (self::ITEMS2025 as $key => $vmi)
        {
            foreach ($vmi as $item) 
            {
                $classes = Osztaly::where(['name' => $key])->where(['year'=>2025])->first();
                $students = new Student();
                $students->name = $item[0];
                $students->gender = $item[1];
                $students->class_id = $classes->id;
                $students->save();
            }
        }
    }
}

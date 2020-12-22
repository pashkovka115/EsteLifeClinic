<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $doctors = [];
        for ($i = 0; $i < 20; $i++) {
            $doctors[] = [
                'name' => $faker->name,
                'education' => '<ul>
    <li>Кубанская государственная медицинская академия по специальности «лечебное дело»</li>
    <li>С 1998г. по 1999г. проходила интернатуру в рабочем порядке на базе МУЗ КМЛДО</li>
    <li>В 1999 присвоена квалификация врача-терапевта</li>
    <li>В 2000г. присвоена квалификация по специальности «эндокринология»</li>
</ul>',
                'add_education' => '<ul>
    <li>В 2006-2007 прошла профессиональную переподготовку в ГОУ ВПО «Кубанский государственный университет» по программе «Психология».</li>
    <li>В 2013г. завершила образовательный модуль «Роль и место образовательных программ в комплексной терапии сахарного диабета».</li>
</ul>',
                'level' => ($i % 4 == 0) ? '0' : '1',
                'img' => ($i == 0) ? 'images/orlova.png' : null
            ];
        }

        \DB::table('doctors')->insert($doctors);
    }
}



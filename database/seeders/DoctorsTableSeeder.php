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
            $name = $faker->unique()->name;
            $doctors[] = [
                'name' => $name,
                'slug' => \Str::slug($name),
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
                'professional_awards' => '<ul><li>Благодарственная грамота Косметологи РФ</li></ul>',
                'medical_associations' => '<ul><li>Косметологи РФ</li></ul>',

                'level' => ($i % 4 == 0) ? '0' : '1',
                'img' => 'images/doctors/2020/12/25/B5mQlJNp5MRMXzTdDGOm14GaR39SuVZ17JPiA1ak.png',
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        \DB::table('doctors')->insert($doctors);
    }
}



<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class HistoryWorkTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $jobs = [];
        for ($i = 0; $i < 7; $i++) {
            $jobs[] = [
                'start' => $faker->dateTimeBetween(),
                'end' => $faker->dateTimeBetween('-1 year'),
                'position' => "Главный врач $i",
                'place' => 'Кубанская государственная областная больница',
                'doctor_id' => 1,
            ];
        }

        \DB::table('history_work')->insert($jobs);
    }
}

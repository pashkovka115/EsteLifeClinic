<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class TreatmentHistoryTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $items = [];

        for ($i = 0; $i < 10; $i++) {
            $items[] = [
                'doctor_id' => 1,
                'cat_service_id' => 1,
                'service_id' => random_int(1, 3),
                'after_images' => 'images/after_befor/after.png',
                'before_images' => 'images/after_befor/before.png',
                'description' => $faker->realText(),
                'done' => $faker->dateTimeBetween()
            ];
        }

        for ($i = 0; $i < 15; $i++) {
            $items[] = [
                'doctor_id' => 2,
                'cat_service_id' => 2,
                'service_id' => random_int(1, 3),
                'after_images' => 'images/after_befor/after.png',
                'before_images' => 'images/after_befor/before.png',
                'description' => $faker->realText(),
                'done' => $faker->dateTimeBetween()
            ];
        }

        \DB::table('treatment_history')->insert($items);
    }
}

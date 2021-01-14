<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AppointmentsTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $appointments = [
            [
                'name' => $faker->unique()->name,
                'phone' => $faker->phoneNumber,
                'cat_servise_id' => 1,
                'service_id' => 1,
                'doctor_id' => 1,
                'date' => '2020-12-05',
                'time' => '14:00',
                'created_at' => now()
            ],
            [
                'name' => $faker->unique()->name,
                'phone' => $faker->phoneNumber,
                'cat_servise_id' => 1,
                'service_id' => 1,
                'doctor_id' => 1,
                'date' => '2020-12-05',
                'time' => '18:30',
                'created_at' => now()
            ],
            [
                'name' => $faker->unique()->name,
                'phone' => $faker->phoneNumber,
                'cat_servise_id' => 1,
                'service_id' => 1,
                'doctor_id' => 1,
                'date' => '2020-12-05',
                'time' => '19:30',
                'created_at' => now()
            ],
            [
                'name' => $faker->unique()->name,
                'phone' => $faker->phoneNumber,
                'cat_servise_id' => 1,
                'service_id' => 1,
                'doctor_id' => 1,
                'date' => '2020-12-05',
                'time' => '8:00',
                'created_at' => now()
            ],
        ];

        \DB::table('appointments')->insert($appointments);
    }
}

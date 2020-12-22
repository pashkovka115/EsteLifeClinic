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
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'cat_servise_id' => 1,
                'service_id' => 1,
                'doctor_id' => 1,
                'day' => '2020-12-05',
                'time' => '17:15',
                'created_at' => now()
            ],
            [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'cat_servise_id' => 1,
                'service_id' => 1,
                'doctor_id' => 1,
                'day' => '2020-12-05',
                'time' => '18:00',
                'created_at' => now()
            ],
            [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'cat_servise_id' => 1,
                'service_id' => 1,
                'doctor_id' => 1,
                'day' => '2020-12-05',
                'time' => '16:30',
                'created_at' => now()
            ],
            [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'cat_servise_id' => 1,
                'service_id' => 1,
                'doctor_id' => 1,
                'day' => '2020-12-05',
                'time' => '20:00',
                'created_at' => now()
            ],
        ];

        \DB::table('appointments')->insert($appointments);
    }
}

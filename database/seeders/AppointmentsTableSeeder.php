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
                'date' => '2020-12-05',
                'created_at' => now()
            ],
            [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'cat_servise_id' => 1,
                'service_id' => 1,
                'doctor_id' => 1,
                'date' => '2020-12-05',
                'created_at' => now()
            ],
            [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'cat_servise_id' => 1,
                'service_id' => 1,
                'doctor_id' => 1,
                'date' => '2020-12-05',
                'created_at' => now()
            ],
            [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'cat_servise_id' => 1,
                'service_id' => 1,
                'doctor_id' => 1,
                'date' => '2020-12-05',
                'created_at' => now()
            ],
        ];

        \DB::table('appointments')->insert($appointments);
    }
}

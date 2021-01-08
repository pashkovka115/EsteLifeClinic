<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class CallsTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $calls = [];
        for ($i = 1; $i <= 15; $i++) {
            $calls[] = [
                'phone' => $faker->phoneNumber,
                'name' => $faker->name,
//                'time' => $faker->dateTimeBetween('-1 year', '+1 year'),
                'status' => ($i == 2 or $i == 5) ? '1' : '0'
            ];
        }

        \DB::table('calls')->insert($calls);
    }
}

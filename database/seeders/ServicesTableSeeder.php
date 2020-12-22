<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ServicesTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $services = [];
        for ($i = 1; $i <= 20; $i++) {
            $services[] = [
                'cat_service_id' => 1,
                'type' => ($i % 2 == 0) ? 'medicine' : 'cosmetology',
                'name' => "Услуга $i",
                'description' => $faker->realText(),
                'price' => random_int(500, 150000),
                'img' => asset('images/bg-category.png'),
                'meta_description' => $faker->realText(),
                'title' => "Title $i",
                'keywords' => $faker->words(3, true),
            ];
        }

        \DB::table('services')->insert($services);
    }
}

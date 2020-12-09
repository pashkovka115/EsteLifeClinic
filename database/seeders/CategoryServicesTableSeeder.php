<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategoryServicesTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $cats = [];
        for ($i = 1; $i <= 20; $i++) {
            $cats[] = [
                'name' => "Аппаратная косметология $i",
                'description' => $faker->realText(),
                'meta_description' => $faker->realText(),
                'title' => $faker->words(3, true),
                'keywords' => $faker->words(10, true),
            ];
        }

        \DB::table('cat_services')->insert($cats);
    }
}

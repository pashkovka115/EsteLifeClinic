<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategoryPostsTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $cats = [];
        for ($i = 1; $i <= 20; $i++) {
            $cats[] = [
                'name' => "Категория новости $i",
                'meta_description' => $faker->realText(),
                'title' => $faker->words(3, true),
                'keywords' => $faker->words(20, true),
            ];
        }

        \DB::table('cat_posts')->insert($cats);
    }
}

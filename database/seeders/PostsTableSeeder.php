<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $posts = [];
        for ($i = 1; $i <= 20; $i++) {
            $posts[] = [
                'name' => ($i % 2 == 0) ? "Новость $i" : "Очень, очень большой при большой и длинный заголовок новости $i",
                'content' => $faker->realText(),
                'title' => $faker->words(3, true),
                'read_time' => '15 минут',
                'meta_description' => $faker->text(),
                'keywords' => $faker->words(20, true),
                'cat_post_id' => 1
            ];
        }

        \DB::table('posts')->insert($posts);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;



class PagesTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $pages = [
            [
                'name' => 'Политика конфиденциальности',
                'slug' => \Str::slug('Политика конфиденциальности'),
                'content' => file_get_contents(base_path('database/seeders/politics.txt')),
                'title' => 'Title - Политика конфиденциальности' ,
                'meta_description' => $faker->realText(),
                'keywords' => $faker->realText(),
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Страница 2',
                'slug' => \Str::slug('Страница 2'),
                'content' => '<p>' . $faker->realText(400) . '</p>',
                'title' => 'Title - Страница 2' ,
                'meta_description' => $faker->realText(),
                'keywords' => $faker->realText(),
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Страница 3',
                'slug' => \Str::slug('Страница 3'),
                'content' => '<p>' . $faker->realText(400) . '</p>',
                'title' => 'Title - Страница 3' ,
                'meta_description' => $faker->realText(),
                'keywords' => $faker->realText(),
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('pages')->insert($pages);
    }
}

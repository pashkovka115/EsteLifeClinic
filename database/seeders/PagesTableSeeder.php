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
                'content' => '<p>' . $faker->realText(400) . '</p>',
                'title' => 'Title - Политика конфиденциальности' ,
                'meta_description' => $faker->realText(),
                'keywords' => $faker->realText(),
                'img' => 'images/di-OR02.jpg'
            ],
            [
                'name' => 'Страница 2',
                'content' => '<p>' . $faker->realText(400) . '</p>',
                'title' => 'Title - Страница 2' ,
                'meta_description' => $faker->realText(),
                'keywords' => $faker->realText(),
                'img' => 'images/di-OR02.jpg'
            ],
            [
                'name' => 'Страница 3',
                'content' => '<p>' . $faker->realText(400) . '</p>',
                'title' => 'Title - Страница 3' ,
                'meta_description' => $faker->realText(),
                'keywords' => $faker->realText(),
                'img' => 'images/di-OR02.jpg'
            ],
        ];

        \DB::table('pages')->insert($pages);
    }
}

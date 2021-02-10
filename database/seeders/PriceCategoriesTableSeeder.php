<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PriceCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Эстетическая косметология',
                'slug' => \Str::slug('Эстетическая косметология'),
                'price_direction_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Дермотологические пилинги',
                'slug' => \Str::slug('Дермотологические пилинги'),
                'price_direction_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Инъекционная косметология',
                'slug' => \Str::slug('Инъекционная косметология'),
                'price_direction_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Коллагенотерапия',
                'slug' => \Str::slug('Коллагенотерапия'),
                'price_direction_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('price_categories')->insert($categories);
    }
}

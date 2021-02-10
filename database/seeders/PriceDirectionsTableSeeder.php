<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PriceDirectionsTableSeeder extends Seeder
{
    public function run()
    {
        $directions = [
            [
                'name' => 'Неврология',
                'slug' => \Str::slug('Неврология'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Косметология',
                'slug' => \Str::slug('Косметология'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Гинекология',
                'slug' => \Str::slug('Гинекология'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Дерматовенерология',
                'slug' => \Str::slug('Дерматовенерология'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('price_directions')->insert($directions);
    }
}

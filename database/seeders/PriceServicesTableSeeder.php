<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PriceServicesTableSeeder extends Seeder
{
    public function run()
    {
        $services = [];

        for ($i = 0; $i < 30; $i++) {
            $services[] = [
                'name' => "$i" . ' Комбинированная чистка лица (ультрозвуковая+механическая чистка), 1,5 часа',
                'slug' => \Str::slug('Комбинированная чистка лица (ультрозвуковая+механическая чистка), 1,5 часа'),
                'price_category_id' => 1,
                'code' => "$i" . ' А22.01.001.001 - ',
                'price' => '2 500',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \DB::table('price_services')->insert($services);
    }
}

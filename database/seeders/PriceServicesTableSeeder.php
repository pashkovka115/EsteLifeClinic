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
//                'pricedirection_id' => 1,
                'name' => "$i" . ' Комбинированная чистка лица (ультрозвуковая+механическая чистка), 1,5 часа',
                'slug' => \Str::slug('Комбинированная чистка лица (ультрозвуковая+механическая чистка), 1,5 часа'),
                'type' => ($i % 2 == 0) ? 1 : 2,
                'parent_id' => ($i % 3 == 0) ? 1 : 0,
                'price' => "$i 500",
                'discount_price' => '100',
                'code' => "$i" . ' А22.01.001.001',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \DB::table('priceservices')->insert($services);
    }
}

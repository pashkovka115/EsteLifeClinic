<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    public function run()
    {
        $options = [
            [
                'key' => 'phone1',
                'val' => '+7 (918) 3-800-900',
                'val2' => null
            ],
            [
                'key' => 'phone2',
                'val' => '+7 (861) 259 24 59',
                'val2' => null
            ],
            [
                'key' => 'address',
                'val' => 'г. Краснодар, ул.Коммунаров 225/1',
                'val2' => null
            ],
            [
                'key' => 'rab_days',
                'val' => 'Пн-Пт',
                'val2'=> '08:00 - 20:00'
            ],
            [
                'key' => 'mini_day',
                'val' => 'Суббота',
                'val2'=> '09:00 - 18:00'
            ],
            [
                'key' => 'email',
                'val' => 'estelifeclinic@mail.ru',
                'val2' => null
            ],
            [
                'key' => 'whatsapp',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
            ],
            [
                'key' => 'telegram',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
            ],
            [
                'key' => 'facebook',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
            ],
            [
                'key' => 'vk',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
            ],
            [
                'key' => 'instagram',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
            ],
            [
                'key' => 'youtube',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
            ],
            [
                'key' => 'prodoctorov',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
            ],
        ];

        \DB::table('options')->insert($options);
    }
}

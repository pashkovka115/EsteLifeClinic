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
                'val2' => null,
                'description' => null
            ],
            [
                'key' => 'phone2',
                'val' => '+7 (861) 259 24 59',
                'val2' => null,
                'description' => null
            ],
            [
                'key' => 'address',
                'val' => 'г. Краснодар, ул.Коммунаров 225/1',
                'val2' => null,
                'description' => null
            ],
            [
                'key' => 'rab_days',
                'val' => 'Пн-Пт',
                'val2'=> '08:00 - 20:00',
                'description' => null
            ],
            [
                'key' => 'mini_day',
                'val' => 'Суббота',
                'val2'=> '09:00 - 18:00',
                'description' => null
            ],
            [
                'key' => 'email',
                'val' => 'estelifeclinic@mail.ru',
                'val2' => null,
                'description' => null
            ],
            [
                'key' => 'whatsapp',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
                'description' => null
            ],
            [
                'key' => 'telegram',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
                'description' => null
            ],
            [
                'key' => 'facebook',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
                'description' => null
            ],
            [
                'key' => 'vk',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
                'description' => null
            ],
            [
                'key' => 'instagram',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
                'description' => null
            ],
            [
                'key' => 'youtube',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
                'description' => null
            ],
            [
                'key' => 'prodoctorov',
                'val' => 'link akkaunt',
                'val2' => 'link ico',
                'description' => null
            ],
            [
                'key' => 'script_head',
                'val' => '<script></script>',
                'val2' => null,
                'description' => 'Скрипты и/или стили в шапке сайта'
            ],
            [
                'key' => 'script_footer',
                'val' => '<script></script>',
                'val2' => null,
                'description' => 'Скрипты и/или стили в подвале сайта'
            ],
        ];

        \DB::table('options')->insert($options);
    }
}

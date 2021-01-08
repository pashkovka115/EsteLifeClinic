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
                'val' => 'г. Краснодар, <br>ул.Коммунаров 225/1',
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
                'val' => 'Сб',
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
                'val' => 'https://www.whatsapp.com/?lang=ru',
                'val2' => '',
                'description' => null
            ],
            [
                'key' => 'telegram',
                'val' => 'https://telegram.org/',
                'val2' => '',
                'description' => null
            ],
            [
                'key' => 'facebook',
                'val' => 'https://ru-ru.facebook.com/',
                'val2' => '',
                'description' => null
            ],
            [
                'key' => 'vk',
                'val' => 'https://vk.com/feed',
                'val2' => '',
                'description' => null
            ],
            [
                'key' => 'instagram',
                'val' => 'https://www.instagram.com/?hl=ru',
                'val2' => '',
                'description' => null
            ],
            [
                'key' => 'youtube',
                'val' => 'https://www.youtube.com/',
                'val2' => '',
                'description' => null
            ],
            [
                'key' => 'prodoctorov',
                'val' => 'https://prodoctorov.ru/',
                'val2' => '',
                'description' => null
            ],
            [
                'key' => 'script_head',
                'val' => '',
                'val2' => null,
                'description' => 'Скрипты и/или стили в шапке сайта'
            ],
            [
                'key' => 'script_footer',
                'val' => '',
                'val2' => null,
                'description' => 'Скрипты в подвале сайта'
            ],
            [
                'key' => 'route_taxis',
                'val' => '21, 42, 62, 78, 85, 93, 196',
                'val2' => null,
                'description' => 'Маршрутное такси'
            ],
            [
                'key' => 'tram',
                'val' => '5, 8, 15, 21, 22 (50 метров от остановки)',
                'val2' => null,
                'description' => 'Трамвай'
            ],
        ];

        \DB::table('options')->insert($options);
    }
}

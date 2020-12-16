<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BannerTableSeeder extends Seeder
{
    public function run()
    {
        $banners = [
            [
                'name' => 'Банер-слайдер верхний для страницы о нас'
            ],
            [
                'name' => 'Мы ценим то, что вы выбрали нас! Мы делаем все, для того, чтобы стоимость наших услуг была привлекательна и максимально доступна для вас.'
            ],
            [
                'name' => 'Сертификаты'
            ],
        ];

        \DB::table('banners')->insert($banners);
    }
}

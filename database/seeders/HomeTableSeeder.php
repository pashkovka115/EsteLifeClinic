<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Seeder;

class HomeTableSeeder extends Seeder
{
    public function run()
    {
        /*
         * Для отладки
         * $page = [
            'top_slider' => 4,
            'two_slider' => 5,
            'action_slider' => 4,
            'medical_center_slider' => 6,
            'count_doctors_list' => 7,
            'count_news' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ];*/

        // Для старта сайта
        $page = [
            'top_slider' => null,
            'two_slider' => null,
            'action_slider' => null,
            'medical_center_slider' => null,
            'count_doctors_list' => 7,
            'count_news' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Home::create($page);
    }
}

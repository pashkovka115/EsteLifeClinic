<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Seeder;

class HomeTableSeeder extends Seeder
{
    public function run()
    {
        $page = [
            'top_slider' => null,
            'two_slider' => null,
            'action_slider' => null,
            'medical_center_slider' => null,
            'count_doctors_list' => 7,
            'count_news' => 3,
        ];

        Home::create($page);
    }
}

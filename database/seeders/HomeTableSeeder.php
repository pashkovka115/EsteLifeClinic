<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Seeder;

class HomeTableSeeder extends Seeder
{
    public function run()
    {
        $page = [
            'top_slider' => 4,
            'two_slider' => 5,
            'action_slider' => 4,
            'medical_center_slider' => 6,
            'count_doctors_list' => 7,
            'count_news' => 3,
        ];

        Home::create($page);
    }
}

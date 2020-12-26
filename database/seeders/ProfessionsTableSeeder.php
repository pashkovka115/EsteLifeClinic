<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfessionsTableSeeder extends Seeder
{
    public function run()
    {
        $ps = [
            'Трихолог',
            'Косметолог',
            'Гинеколог',
            'Невролог',
            'Дерматолог',
            'Эндокринолог',
        ];
        $profs = [];
        foreach ($ps as $str){
            $profs[] = [
                'name' => $str,
                'slug' => \Str::slug($str)
            ];
        }

        \DB::table('professions')->insert($profs);
    }
}

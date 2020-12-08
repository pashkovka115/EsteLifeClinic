<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PracticalInterestsTableSeeder extends Seeder
{
    public function run()
    {
        $ins = [
            [
                'doctor_id' => 1,
                'description' => 'Ведение беременных с сахарным диабетом, заболеваниями щитовидной железы',
                'ico' => ''
            ],
            [
                'doctor_id' => 1,
                'description' => 'Коррекция ожирения, возрастного дефицита половых гормонов у мужчин и женщин',
                'ico' => ''
            ],
            [
                'doctor_id' => 1,
                'description' => 'Диагностика и лечение заболеваний щитовидной железы, гипофиза, надпочечников, сахарного диабета',
                'ico' => ''
            ],
            [
                'doctor_id' => 1,
                'description' => 'Диагностика и лечение остеопороза',
                'ico' => ''
            ],
        ];

        \DB::table('practical_interests')->insert($ins);
    }
}

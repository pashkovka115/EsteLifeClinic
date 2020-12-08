<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfessionsTableSeeder extends Seeder
{
    public function run()
    {
        $ps = [
            'Логопед',
            'Маммолог',
            'Мануальный терапевт',
            'Окулист (офтальмолог)',
            'Ортопед',
            'Остеопат',
        ];
        $profs = [];
        foreach ($ps as $str){
            $profs[] = [
                'name' => $str
            ];
        }

        \DB::table('professions')->insert($profs);
    }
}

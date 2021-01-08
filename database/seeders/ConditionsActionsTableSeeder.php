<?php

namespace Database\Seeders;

use App\Models\Action;
use Illuminate\Database\Seeder;

class ConditionsActionsTableSeeder extends Seeder
{
    public function run()
    {
        $cnt_ac = Action::count();
        $strs = [
            'Первое',
            'Второе',
            'Третье',
            'Четвёртое',
            'Пятое',
        ];
        $conditions = [];

        for ($j = 1; $j <= $cnt_ac; $j++) {
            for ($i = 0; $i < 5; $i++) {
                $conditions[] = [
                    'action_id' => $j,
                    'condition' => $strs[$i]
                ];
            }
        }

        \DB::table('conditions_actions')->insert($conditions);
    }
}


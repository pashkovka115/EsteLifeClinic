<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Seeder;

class DoctorsHasProfessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profs = Profession::all('id')->keyBy('id')->toArray();
        $rels = [];
        foreach ($profs as $key => $prof){
            $rels[] = [
                'doctor_id' => 1,
                'profession_id' => $key
            ];
        }

        \DB::table('doctors_has_professions')->insert($rels);
    }
}

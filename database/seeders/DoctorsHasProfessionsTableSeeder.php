<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Profession;
use Illuminate\Database\Seeder;

class DoctorsHasProfessionsTableSeeder extends Seeder
{
    public function run()
    {
        $profs = Profession::all('id')->keyBy('id')->toArray();
        $rels = [];
        $doctors = Doctor::count();
        $i = 1;
        foreach ($profs as $key => $prof){
            if ($i > $doctors){
                break;
            }
            $rels[] = [
                'doctor_id' => $i,
                'profession_id' => $key
            ];
            $i++;
        }

        \DB::table('doctors_has_professions')->insert($rels);
    }
}

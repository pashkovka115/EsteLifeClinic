<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesHasDoctorsTableSeeder extends Seeder
{
    public function run()
    {
        $profs = Service::all('id')->keyBy('id')->toArray();
        $rels = [];
        $i = 1;
        foreach ($profs as $key => $prof){
            $rels[] = [
                'doctor_id' => 1,
                'service_id' => $key
            ];
            $i++;
            if ($i >= 5)
                break;
        }

        \DB::table('services_has_doctors')->insert($rels);
    }
}

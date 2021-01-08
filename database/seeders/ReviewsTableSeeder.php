<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ReviewsTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $reviews = [];
        for ($i = 0; $i < 20; $i++) {
            $reviews[] = [
                'cat_service_id' => random_int(1, 3),
                'visibility' => ($i % 3 == 0) ? '0' : '1',
                'name' => 'Ольга Константиновна',
                'phone' => $faker->phoneNumber,
                'content' => "$i".' Я являюсь постоянным пациентом врача Азаренко С.О. уже на протяжении 2-ух лет. Делала различные процедуры начиная с увлажнения кожи и заканчивая контурной пластикой. Эффект очень нравится, советую Светлану Олеговну всем своим знакомым. Я являюсь постоянным пациентом врача Азаренко С.О. уже на протяжении 2-ух лет. Делала различные процедуры начиная с увлажнения кожи и заканчивая контурной пластикой. Эффект очень нравится, советую Светлану Олеговну всем своим знакомым.',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \DB::table('reviews')->insert($reviews);
    }
}


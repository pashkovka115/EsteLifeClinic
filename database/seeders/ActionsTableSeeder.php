<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ActionsTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $actions = [];

        for ($i = 1; $i <= 10; $i++) {
            $actions[] = [
                'name' => "№ $i «Мужчины " . ($i * 10 + 10) . "+»",
                'type' => ($i % 2 == 0) ? 'Программа обследования' : 'Ежегодная акция',
                'slogan' => 'Подарок к 23 февраля!',
                'img' => 'images/banner1.png',
                'discount' => '1500 ₽',
                'description' => 'Мы ведущая клиника и центр косметологии в Краснодаре. Здесь вы пройдете качественную диагностику, лечение заболеваний и коррекцию косметологических проблем с комфортом и максимальной эффективностью. Наша клиника оснащена новейшим медицинским оборудованием, позволяющим выполнять диагностику заболеваний максимально информативно и точно. В своей работе мы используем расходные материалы и косметические продукты самого высокого качества, ведь ваше здоровье и доверие – главное для нас.',
                'start' => $faker->dateTimeBetween(),
                'finish' => $faker->dateTimeBetween('+1 year','+30 years')
            ];
        }

        \DB::table('actions')->insert($actions);
    }
}

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
            $name = "№ $i «Мужчины " . ($i * 10 + 10) . "+»";
            $actions[] = [
                'name' => $name,
                'slug' => \Str::slug($name),
                'type' => ($i % 2 == 0) ? 'Программа обследования' : 'Ежегодная акция',
                'slogan' => 'Подарок к 23 февраля!',
                'big_img' => 'public/img/bg-action-full.png',
                'banner_img' => 'public/img/banner1.png',
                'discount' => '1500',
                'short_description' => 'Объект апериодичен. Уравнение малых колебаний искажает маховик. Вектор угловой скорости интегрирует угол крена.',
                'description' => 'Мы ведущая клиника и центр косметологии в Краснодаре. Здесь вы пройдете качественную диагностику, лечение заболеваний и коррекцию косметологических проблем с комфортом и максимальной эффективностью. Наша клиника оснащена новейшим медицинским оборудованием, позволяющим выполнять диагностику заболеваний максимально информативно и точно. В своей работе мы используем расходные материалы и косметические продукты самого высокого качества, ведь ваше здоровье и доверие – главное для нас.',
                'conditions' => '<ul>
                                    <li><a href="#">Первое</a></li>
                                    <li><a href="#">Второе</a></li>
                                    <li><a href="#">Третье</a></li>
                                    <li><a href="#">Четвёртое</a></li>
                                    <li><a href="#">Пятое</a></li>
                                </ul>',
                'start' => ($i == 1) ? $faker->dateTimeBetween('-1 day') : $faker->dateTimeBetween(),
                'finish' => ($i == 1) ? $faker->dateTimeBetween('+2 days', '+3 days') : $faker->dateTimeBetween('+1 year','+30 years'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \DB::table('actions')->insert($actions);
    }
}

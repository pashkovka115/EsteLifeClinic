<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menu = [
            'name' => 'Верхнее меню',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $menu_items = [
            [
                'label' => 'Косметология',
                'link' => '#',
                'parent' => '0',
                'sort' => '0',
                'class' => null,
                'menu' => 1,
                'depth' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'Медицина',
                'link' => '#',
                'parent' => '0',
                'sort' => '1',
                'class' => null,
                'menu' => 1,
                'depth' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'Цены',
                'link' => '/price',
                'parent' => '0',
                'sort' => '2',
                'class' => null,
                'menu' => 1,
                'depth' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'Акции',
                'link' => '/actions',
                'parent' => '0',
                'sort' => '3',
                'class' => null,
                'menu' => 1,
                'depth' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'Врачи',
                'link' => '/doctors',
                'parent' => '0',
                'sort' => '5',
                'class' => null,
                'menu' => 1,
                'depth' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'До/После',
                'link' => '/difference',
                'parent' => '0',
                'sort' => '6',
                'class' => null,
                'menu' => 1,
                'depth' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'О нас',
                'link' => '/about-company',
                'parent' => '0',
                'sort' => '7',
                'class' => null,
                'menu' => 1,
                'depth' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'Контакты',
                'link' => '/contacts',
                'parent' => '0',
                'sort' => '8',
                'class' => null,
                'menu' => 1,
                'depth' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('admin_menus')->insert($menu);
        \DB::table('admin_menu_items')->insert($menu_items);
    }
}

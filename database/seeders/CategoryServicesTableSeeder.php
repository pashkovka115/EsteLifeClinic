<?php

namespace Database\Seeders;

use App\Models\CatService;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategoryServicesTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $cats = [
            ['parent_id' => null, 'name' => 'Категория 1.1', 'slug' => \Str::slug('Категория 1.1'), 'before_after' => '1', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 1, 'name' => 'Категория 1.2', 'slug' => \Str::slug('Категория 1.2'), 'before_after' => '1', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 2, 'name' => 'Категория 1.3', 'slug' => \Str::slug('Категория 1.3'), 'before_after' => '1', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 3, 'name' => 'Категория 1.4', 'slug' => \Str::slug('Категория 1.4'), 'before_after' => '1', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 4, 'name' => 'Категория 1.5', 'slug' => \Str::slug('Категория 1.5'), 'before_after' => '1', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],

            ['parent_id' => null, 'name' => 'Категория 2.1', 'slug' => \Str::slug('Категория 2.1'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 6, 'name' => 'Категория (а) 2.2', 'slug' => \Str::slug('Категория (а) 2.2'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 7, 'name' => 'Категория (а) 2.3', 'slug' => \Str::slug('Категория (а) 2.3'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 8, 'name' => 'Категория (а) 2.4', 'slug' => \Str::slug('Категория (а) 2.4'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 9, 'name' => 'Категория (а) 2.5', 'slug' => \Str::slug('Категория (а) 2.5'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],

            ['parent_id' => 6, 'name' => 'Категория (б) 2.2', 'slug' => \Str::slug('Категория (б) 2.2'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 11, 'name' => 'Категория (б) 2.3', 'slug' => \Str::slug('Категория (б) 2.3'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 12, 'name' => 'Категория (б) 2.4', 'slug' => \Str::slug('Категория (б) 2.4'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 13, 'name' => 'Категория (б) 2.5', 'slug' => \Str::slug('Категория (б) 2.5'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],


            ['parent_id' => null, 'name' => 'Категория 3.1', 'slug' => \Str::slug('Категория 3.1'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 15, 'name' => 'Категория 3.2', 'slug' => \Str::slug('Категория 3.2'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],

            ['parent_id' => null, 'name' => 'Категория 4.1', 'slug' => \Str::slug('Категория 4.1'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => null, 'name' => 'Категория 5.1', 'slug' => \Str::slug('Категория 5.1'), 'before_after' => '0', 'description' => $faker->realText(),'meta_description' => $faker->realText(),'title' => $faker->words(3, true),'keywords' => $faker->words(10, true), 'created_at' => now(), 'updated_at' => now()],


        ];

        \DB::table('cat_services')->insert($cats);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(HistoryWorkTableSeeder::class);
        $this->call(CategoryServicesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(ProfessionsTableSeeder::class);
        $this->call(DoctorsHasProfessionsTableSeeder::class);
        $this->call(ServicesHasDoctorsTableSeeder::class);
        $this->call(PracticalInterestsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
    }
}

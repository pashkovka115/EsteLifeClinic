<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesTableSeeder::class); // Для старта сайта
        $this->call(UsersTableSeeder::class); // Для старта сайта
//        $this->call(DoctorsTableSeeder::class);
//        $this->call(HistoryWorkTableSeeder::class);
//        $this->call(CategoryServicesTableSeeder::class);
//        $this->call(ServicesTableSeeder::class);
//        $this->call(ProfessionsTableSeeder::class);
//        $this->call(DoctorsHasProfessionsTableSeeder::class);
//        $this->call(ServicesHasDoctorsTableSeeder::class);
//        $this->call(PracticalInterestsTableSeeder::class);
//        $this->call(ReviewsTableSeeder::class);
//        $this->call(CategoryPostsTableSeeder::class);
//        $this->call(PostsTableSeeder::class);
//        $this->call(TreatmentHistoryTableSeeder::class);
        $this->call(OptionsTableSeeder::class); // Для старта сайта
//        $this->call(BannerTableSeeder::class);
//        $this->call(BannerItemsTableSeeder::class);
        $this->call(CompanyTableSeeder::class); // Для старта сайта
//        $this->call(PagesTableSeeder::class);
//        $this->call(ActionsTableSeeder::class);
//        $this->call(AppointmentsTableSeeder::class);
//        $this->call(CallsTableSeeder::class);
//        $this->call(ConditionsActionsTableSeeder::class);
        $this->call(HomeTableSeeder::class); // Для старта сайта
//        $this->call(OnlineConsultationsTableSeeder::class);
    }
}

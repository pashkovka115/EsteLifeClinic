<?php

namespace App\Providers;

use App\Models\CatService;
use App\Models\Doctor;
use App\Models\Page;
use App\Models\Profession;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, 'ru_RU.UTF-8');
        Carbon::setLocale(config('app.locale'));

        require base_path('app/included/functions.php');

        Schema::defaultStringLength(191);

        // Верхнее меню
        \View::composer('partials.top_menu', function($view) {
            $view->with(['top_menu_professions' => Profession::with(['doctors'])->get()]);
        });

        // Верхнее меню
        \View::composer('partials.top_menu', function($view) {
            $view->with(['cats_menu' => CatService::whereNull('parent_id')->with(['children'])->get()]);
        });

        // Меню в подвале
        \View::composer('partials.footer', function($view) {
            $view->with(['parents_cats' => CatService::whereNull('parent_id')->get()]);
        });

        // Страницы в подвале
        \View::composer('partials.footer', function($view) {
            $view->with(['pages' => Page::all(['slug', 'name'])]);
        });

        // форма записи на приём
        \View::composer('partials.footer', function($view) {
            $view->with(['categories' => CatService::all(['id', 'name'])]);
        });

        \View::composer('partials.footer', function($view) {
            $view->with(['services' => Service::all(['id', 'name'])]);
        });

        \View::composer('partials.footer', function($view) {
            $view->with(['doctors' => Doctor::all(['id', 'name'])]);
        });
        // конец. форма записи на приём
    }
}

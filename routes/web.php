<?php

use Illuminate\Support\Facades\Route;


/*
Route::get('/', function () {
    return view('welcome');
})->name('home');*/



Auth::routes([
    'register' => false,
    'reset' => false,
    'confirm' => false,
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Врачи
Route::get('dostors', 'DoctorController@index')->name('front.doctors.index');
Route::get('dostors/show/{slug}', 'DoctorController@show')->name('front.doctors.show');
Route::post('dostors', 'DoctorController@ajax')->name('front.doctors.index.ajax');
Route::get('dostors/professions/{profession}', 'DoctorProfessionsController@index')->name('front.doctors.professions');
Route::post('dostors/professions/{profession}', 'DoctorProfessionsController@ajax')->name('front.doctors.professions.ajax');


//Админ-панель
Route::group(['middleware'=>\App\Http\Middleware\CheckRole::class, 'roles'=>['Admin'], 'prefix'=>'admin', 'as'=>'admin.'], function () {

    #главная админ-панели
    Route::get('/', 'AdminController@index')->name('home');

    // Запись на приём
    Route::prefix('home')->as('home.')->group(function(){
        Route::resource('appointments', 'Admin\AdminAppointmentController')->except('show')->names('home.appointments');
    });

    //Раздел врачи
    Route::prefix('doctors')->as('doctors.')->group(function(){
        Route::resource('doctors', 'Admin\AdminDoctorController')->except('show')->names('doctors');
        Route::resource('professions', 'Admin\AdminProfessionController')->except('show')->names('professions');
    });

    // Раздел услуги
    Route::prefix('services')->as('services.')->group(function(){
        Route::resource('services', 'Admin\AdminServiceController')->except('show')->names('services');
        Route::resource('categories', 'Admin\AdminCategoryServiceController')->except('show')->names('categories');
    });


    // Раздел страницы
    Route::prefix('pages')->as('pages.')->group(function(){
        Route::resource('category/news', 'Admin\AdminCatNewsController')->except('show')->names('category.news');
        Route::resource('news', 'Admin\AdminNewsController')->except('show')->names('news');
        Route::resource('pages', 'Admin\AdminPageController')->except('show')->names('pages');
        Route::resource('company', 'Admin\AdminCompanyController')->only(['edit', 'update'])->names('company');
    });

    // Раздел администратор (верхнее меню)
    Route::prefix('administrator')->as('administrator.')->group(function(){
        Route::resource('administrator', 'Admin\AdministratorController')->only(['index', 'update'])->names('administrator');
    });


    // Раздел настройки
    Route::prefix('options')->as('options.')->group(function(){
        // Общие настройки
        Route::resource('options', 'Admin\AdminOptionController')->only(['index', 'edit', 'update'])->names('options');
        // Баннеры. Список
//        Route::get('banners', 'Admin\AdminBannerController@index')->name('banners.list');
        Route::resource('banners', 'Admin\AdminBannerController')->names('banners.list');
        // Баннеры. Элементы
        Route::get('banners/banner/items/{id}', 'Admin\AdminBannerItemsController@index')->name('banners.banner.items');
        Route::get('banners/banner/item/create/{id}', 'Admin\AdminBannerItemsController@create')->name('banners.banner.item.create');
        Route::post('banners/banner/item/store/{id}', 'Admin\AdminBannerItemsController@store')->name('banners.banner.item.store');
        Route::put('banners/banner/item/update/{id}', 'Admin\AdminBannerItemsController@update')->name('banners.banner.item.update');
        Route::get('banners/banner/item/edit/{id}', 'Admin\AdminBannerItemsController@edit')->name('banners.banner.item.edit');
        Route::delete('banners/banner/item/destroy/{id}', 'Admin\AdminBannerItemsController@destroy')->name('banners.banner.item.destroy');

        // Меню
        Route::resource('menu', 'Admin\AdminMenuController')->only(['index'])->names('menu');
    });

    // Раздел Контент
    Route::prefix('content')->as('content.')->group(function(){
        // Акции и скидки
        Route::prefix('actions')->as('actions.')->group(function(){
            Route::resource('actions', 'Admin\AdminActionController')->except('show')->names('actions');
        });

        // До/После
        Route::prefix('before-after')->as('before_after.')->group(function(){
            Route::resource('before-after', 'Admin\BeforeAfterController')->except('show')->names('before_after');
        });

        // отзывы
        Route::prefix('reviews')->as('reviews.')->group(function(){
            Route::resource('reviews', 'Admin\AdminReviewController')->except('show')->names('reviews');
        });
    });

    // Поддержка
    Route::resource('support', 'Admin\AdminSupportController')->names('support');

    // Обратные звонки
    Route::get('calls', 'Admin\AdminCallsController@index')->name('calls.index');
    Route::post('calls/destroy', 'Admin\AdminCallsController@destroy')->name('calls.destroy');
    Route::post('calls/update', 'Admin\AdminCallsController@update')->name('calls.update');

    // Отдельная страница SEO
    Route::prefix('seo')->as('seo.')->group(function (){
        Route::get('', 'Admin\AdminSeoController@index')->name('index');
        Route::post('update', 'Admin\AdminSeoController@update')->name('update');
    });
});



// Sitemaps
//    Route::get('/sitemap', 'HomeController@sitemapIndex'); //Все sitemaps
//    Route::get('/sitemap/ceilings', 'HomeController@sitemapCeilings'); //sitemap на потолки
//    Route::get('/sitemap/ceilings/images', 'HomeController@sitemapImages'); //sitemap на фотографии потолков

Route::prefix('sitemap')->group(function (){
    // Все
    Route::get('', 'Admin\AdminSiteMapController@index');
    // Услуги
    Route::get('services', 'Admin\AdminSiteMapController@services');
    // Категории услуг
    Route::get('cats-services', 'Admin\AdminSiteMapController@catServices');
    // Врачи
    Route::get('doctors', 'Admin\AdminSiteMapController@doctors');
});














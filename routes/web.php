<?php

use Illuminate\Support\Facades\Route;


Auth::routes([
    'register' => false,
    'reset' => false,
    'confirm' => false,
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('front.home');

// Врачи
Route::prefix('doctors')->group(function (){
    Route::get('', 'DoctorController@index')->name('front.doctors.index');
    Route::get('/{slug}', 'DoctorController@show')->name('front.doctors.show');
    Route::post('', 'DoctorController@ajax')->name('front.doctors.index.ajax');
    Route::get('/professions/{profession}', 'DoctorProfessionsController@index')->name('front.doctors.professions');
    Route::post('/professions/{profession}', 'DoctorProfessionsController@ajax')->name('front.doctors.professions.ajax');
});

// Акции
Route::prefix('actions')->group(function (){
    Route::get('', 'ActionController@index')->name('front.actions.index');
    Route::get('{slug}', 'ActionController@show')->name('front.actions.show');
});

// До/После
Route::prefix('difference')->group(function (){
    Route::get('', 'BeforeAfterController@index')->name('front.before_after.index');
    Route::get('show/{slug}', 'BeforeAfterController@show')->name('front.before_after.show');

    Route::post('{slug?}', 'BeforeAfterController@ajax')->name('front.before_after.ajax');
});

// О компании
Route::get('about-company', 'AboutCompanyController@index')->name('front.about.company');

// Контакты
Route::get('contacts', 'ContactController@index')->name('front.contact');

// Новости
Route::prefix('news')->group(function () {
    Route::get('', 'NewsController@index')->name('front.news.index');
    Route::get('/category/{slug}', 'NewsController@categoryIndex')->name('front.news.category_index');
    Route::get('/{slug}', 'NewsController@show')->name('front.news.show');
    Route::post('/ajax', 'NewsController@ajax')->name('front.news.ajax');
    Route::post('/category/{slug}/ajax', 'NewsController@categoryAjax')->name('front.news.category.ajax');
});

// Страницы
Route::get('page/{slug}', 'PageController@show')->name('front.page.show');

// Обратный звонок
Route::post('call', 'CallController@store')->name('front.call.store');

// Запись на приём
Route::post('appointment', 'AppointmentController@store')->name('front.appointment.store');

// Цены
Route::prefix('price')->group(function (){
    Route::get('', 'PriceController@index')->name('front.price');
    Route::get('{slug}', 'PriceController@show')->name('front.price.show.category');
    Route::post('search', 'PriceController@search')->name('front.price.search');
});


// Отзывы reviews
Route::prefix('reviews')->group(function (){
    Route::get('', 'ReviewController@index')->name('front.reviews');
    Route::post('', 'ReviewController@index_ajax')->name('front.reviews_ajax');
    Route::post('store', 'ReviewController@store')->name('front.reviews.store');
    Route::get('show/{cat_id}', 'ReviewController@show')->name('front.reviews.show');
    Route::post('show/{cat_id}', 'ReviewController@show_ajax')->name('front.reviews.show_ajax');
});


// Поиск
Route::get('search', 'SearchController@index')->name('front.search');

// Услуга
Route::get('service/{slug}', 'ServiceController@show')->name('front.service.show');



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
//        Route::resource('services', 'Admin\AdminServiceController')->except('show')->names('services');
        Route::post('services', 'Admin\AdminServiceController@store')->name('services.store');
        Route::get('services', 'Admin\AdminServiceController@index')->name('services.index');
        Route::get('services/create/{type}', 'Admin\AdminServiceController@create')->name('services.create');
        Route::delete('services/{service}', 'Admin\AdminServiceController@destroy')->name('services.destroy');
        Route::put('services/{service}', 'Admin\AdminServiceController@update')->name('services.update');
        Route::get('services/{service}/edit', 'Admin\AdminServiceController@edit')->name('services.edit');

        Route::post('categories', 'Admin\AdminCategoryServiceController@store')->name('categories.store');
        Route::get('categories', 'Admin\AdminCategoryServiceController@index')->name('categories.index');
        Route::get('categories/create/{type}', 'Admin\AdminCategoryServiceController@create')->name('categories.create');
        Route::delete('categories/{category}', 'Admin\AdminCategoryServiceController@destroy')->name('categories.destroy');
        Route::put('categories/{category}', 'Admin\AdminCategoryServiceController@update')->name('categories.update');
        Route::get('categories/{category}/edit', 'Admin\AdminCategoryServiceController@edit')->name('categories.edit');

//        Route::resource('categories', 'Admin\AdminCategoryServiceController')->except('show')->names('categories');
//        Route::post('categories', 'Admin\AdminCategoryServiceController')->names('categories');
    });


    // Раздел страницы
    Route::prefix('pages')->as('pages.')->group(function(){
        Route::get('home/edit', 'Admin\AdminHomeController@edit')->name('home.edit');
        Route::put('home/update', 'Admin\AdminHomeController@update')->name('home.update');

        Route::resource('category/news', 'Admin\AdminCatNewsController')->except('show')->names('category.news');
        Route::resource('news', 'Admin\AdminNewsController')->except('show')->names('news');
        Route::resource('pages', 'Admin\AdminPageController')->except('show')->names('pages');
        Route::resource('company', 'Admin\AdminCompanyController')->only(['edit', 'update'])->names('company');

        Route::post('file-upload', 'Admin\AdminPageController@file_upload')->name('pages.file_upload');
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
            // Условия акции
            Route::get('conditions/{action_id}/{condition_id}', 'Admin\AdminConditionController@edit')->name('conditions_actions.edit');
            Route::get('conditions/create', 'Admin\AdminConditionController@create')->name('conditions_actions.create');
            Route::post('conditions/store', 'Admin\AdminConditionController@store')->name('conditions_actions.store');
            Route::put('conditions/update/{id}', 'Admin\AdminConditionController@update')->name('conditions_actions.update');
            Route::delete('conditions/destroy/{id}', 'Admin\AdminConditionController@destroy')->name('conditions_actions.destroy');
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
    Route::delete('calls/{call}/destroy', 'Admin\AdminCallsController@destroy')->name('calls.destroy');
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
    Route::get('', 'Admin\AdminSiteMapController@index')->name('sitemap.index');
    // Главная
    Route::get('home', 'Admin\AdminSiteMapController@home')->name('sitemap.home');
    // Услуги
    Route::get('services', 'Admin\AdminSiteMapController@services')->name('sitemap.services');
    // Врачи
    Route::get('doctors', 'Admin\AdminSiteMapController@doctors')->name('sitemap.doctors');
    // Врачи по профессиям
    Route::get('doctors-profession', 'Admin\AdminSiteMapController@doctors_professions')->name('sitemap.doctors_profession');
    // Цены
    Route::get('price', 'Admin\AdminSiteMapController@price')->name('sitemap.price');
    // Акции, скидки
    Route::get('actions', 'Admin\AdminSiteMapController@actions')->name('sitemap.actions');
    // До/После
    Route::get('difference', 'Admin\AdminSiteMapController@difference')->name('sitemap.difference');
    // О компании
    Route::get('about-company', 'Admin\AdminSiteMapController@about_company')->name('sitemap.about_company');
    // Контакты
    Route::get('contacts', 'Admin\AdminSiteMapController@contacts')->name('sitemap.contacts');
    // Страницы
    Route::get('pages', 'Admin\AdminSiteMapController@pages')->name('sitemap.pages');
    // Новости
    Route::get('news', 'Admin\AdminSiteMapController@news')->name('sitemap.news');
});














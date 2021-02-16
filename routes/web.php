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

// Запись на онлайн консультацию
Route::post('online', 'OnlineConsultation@store')->name('front.online.store');

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
        // Онлайн консультации
        Route::resource('online', 'Admin\AdminOnlineConsultationController')->except('show')->names('home.online');
    });

    //Раздел врачи
    Route::prefix('doctors')->as('doctors.')->group(function(){
        Route::resource('doctors', 'Admin\AdminDoctorController')->except('show')->names('doctors');
        Route::resource('professions', 'Admin\AdminProfessionController')->except('show')->names('professions');
    });

    // Раздел услуги
    Route::prefix('services')->as('services.')->group(function(){
        Route::post('services-store', 'Admin\AdminServiceController@store')->name('services.store');
        Route::get('services', 'Admin\AdminServiceController@index')->name('services.index');
//        Route::get('services/create/{type}', 'Admin\AdminServiceController@create')->name('services.create');
        Route::get('services/create', 'Admin\AdminServiceController@create')->name('services.create');
        Route::delete('services/{service}', 'Admin\AdminServiceController@destroy')->name('services.destroy');
        Route::put('services/{service}', 'Admin\AdminServiceController@update')->name('services.update');
        Route::get('services/{service}/edit', 'Admin\AdminServiceController@edit')->name('services.edit');
        // ajax
        Route::post('services', 'Admin\AdminServiceController@updateAjax')->name('services.update_ajax');

        // Связь услуги - цены
        Route::post('services-price-store', 'Admin\AdminServiceController@tiePriceService')->name('services.service_price_store');
        Route::post('service/{service_id}/detach-price/{priceservice_id}', 'Admin\AdminServiceController@detachPrice')
            ->name('service.service_detach_price');

        //ajax
        Route::post('categories/get-categories', 'Admin\AdminCategoryServiceController@getCategories')->name('categories.get_categories');

        Route::post('categories', 'Admin\AdminCategoryServiceController@store')->name('categories.store');
        Route::get('categories', 'Admin\AdminCategoryServiceController@index')->name('categories.index');
//        Route::get('categories/create/{type}', 'Admin\AdminCategoryServiceController@create')->name('categories.create');
        Route::get('categories/create', 'Admin\AdminCategoryServiceController@create')->name('categories.create');
        Route::delete('categories/{category}', 'Admin\AdminCategoryServiceController@destroy')->name('categories.destroy');
        Route::put('categories/{category}', 'Admin\AdminCategoryServiceController@update')->name('categories.update');
        Route::get('categories/{category}/edit', 'Admin\AdminCategoryServiceController@edit')->name('categories.edit');

//        Route::resource('categories', 'Admin\AdminCategoryServiceController')->except('show')->names('categories');
//        Route::post('categories', 'Admin\AdminCategoryServiceController')->names('categories');
    });

    // Раздел цены
    Route::prefix('price')->group(function (){
        // Направления
        Route::get('direction', 'Admin\Price\AdminDirectionController@index')->name('price.direction.index');
        Route::post('direction', 'Admin\Price\AdminDirectionController@store')->name('price.direction.store');
        Route::get('direction/{direction}/edit', 'Admin\Price\AdminDirectionController@edit')->name('price.direction.edit');
        Route::put('direction/{direction}', 'Admin\Price\AdminDirectionController@update')->name('price.direction.update');
        Route::delete('direction/{direction}', 'Admin\Price\AdminDirectionController@destroy')->name('price.direction.destroy');

        // Категории
        // Ajax
        Route::post('category/ajax/edit', 'Admin\Price\AdminCategoryController@editAjax')->name('price.category.edit_ajax');
        Route::post('category/ajax/getprice', 'Admin\Price\AdminCategoryController@getPriceAjax')->name('price.category.get_price_ajax');
        Route::post('category/ajax/get-group-service', 'Admin\Price\AdminServiceController@getGroupService')->name('price.category.get_group_service_ajax');

        Route::get('category/{direction_id}', 'Admin\Price\AdminCategoryController@index')->name('price.category.index');
        Route::post('category', 'Admin\Price\AdminCategoryController@store')->name('price.category.store');
        Route::get('category/{id}/edit', 'Admin\Price\AdminCategoryController@edit')->name('price.category.edit');
        Route::put('category/{id}', 'Admin\Price\AdminCategoryController@update')->name('price.category.update');
        Route::delete('category/{id}', 'Admin\Price\AdminCategoryController@destroy')->name('price.category.destroy');

        // Услуги
        Route::get('service-all', 'Admin\Price\AdminServiceController@startPageForAjax')->name('price.service.all_services');
//        Route::any('service-data', 'Admin\Price\AdminServiceController@dataForAjax')->name('price.service.data_services');

        Route::get('service/{category_id}', 'Admin\Price\AdminServiceController@index')->name('price.service.index');
        Route::post('service/store', 'Admin\Price\AdminServiceController@store')->name('price.service.store');

        Route::get('service/create/new/service', 'Admin\Price\AdminServiceController@createNewService')->name('price.service.create_new_service');
        Route::post('service/store/new/service', 'Admin\Price\AdminServiceController@storeNewService')->name('price.service.store_new_service');

//        Route::get('service/{id}/edit', 'Admin\Price\AdminServiceController@edit')->name('price.service.edit');
//        Route::put('service/{id}', 'Admin\Price\AdminServiceController@update')->name('price.service.update');
        Route::post('service', 'Admin\Price\AdminServiceController@update')->name('price.service.update');
        Route::delete('service/{id}', 'Admin\Price\AdminServiceController@destroy')->name('price.service.destroy');
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

            // Акции - услуги
            Route::post('add-tie-service-actions-post', 'Admin\AdminActionController@addTieService')->name('add_tie_service_actions');
            Route::post('destroy-tie-service-actions-post', 'Admin\AdminActionController@destroyTieService')->name('destroy_tie_service_actions');
            // ajax
            Route::post('actions-get-service-ajax', 'Admin\AdminActionController@getCatsWithServicesAjax')->name('service_actions.get');
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














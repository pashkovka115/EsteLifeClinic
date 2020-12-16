<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


//Админ-панель
//Route::group(['middleware'=>'roles','roles'=>['Admin'], 'prefix'=>'admin', 'as'=>'admin.'], function () {
//Route::middleware(\App\Http\Middleware\CheckRole::class)->prefix('admin')->as('admin.')->group(function (){
Route::group(['middleware'=>\App\Http\Middleware\CheckRole::class, 'roles'=>['Admin'], 'prefix'=>'admin', 'as'=>'admin.'], function () {

    #главная админ-панели
    Route::get('/', 'AdminController@index')->name('index');

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

    // Раздел отзывы
    Route::prefix('reviews')->as('reviews.')->group(function(){
        Route::resource('reviews', 'Admin\AdminReviewController')->except('show')->names('reviews');
    });

    // Раздел страницы
    Route::prefix('pages')->as('pages.')->group(function(){
        Route::resource('category/news', 'Admin\AdminCatNewsController')->except('show')->names('category.news');
        Route::resource('news', 'Admin\AdminNewsController')->except('show')->names('news');
        Route::resource('company', 'Admin\AdminCompanyController')->only(['edit', 'update'])->names('company');
    });

    // Раздел администратор
    Route::prefix('administrator')->as('administrator.')->group(function(){
        Route::resource('administrator', 'Admin\AdministratorController')->only(['index', 'update'])->names('administrator');
    });

    // Раздел До/После
    Route::prefix('before-after')->as('before_after.')->group(function(){
        Route::resource('before-after', 'Admin\BeforeAfterController')->except('show')->names('before_after');
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
//        Route::resource('banners/items', 'Admin\AdminBannerItemsController')->except(['index', 'show'])->names('banners.items');
    });
});















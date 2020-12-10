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
Route::middleware(\App\Http\Middleware\CheckRole::class)->prefix('admin')->as('admin.')->group(function (){

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
});















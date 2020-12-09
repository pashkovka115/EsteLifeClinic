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
//    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('index');

    //Раздел врачи
//    Route::group(['prefix'=>'doctors', 'as'=>'doctors.'], function(){
    Route::prefix('doctors')->as('doctors.')->group(function(){
        // Работа с врачами
//        Route::resource('doctors', \App\Http\Controllers\Admin\AdminDoctorController::class)->except('show')->names('doctors');
        Route::resource('doctors', 'Admin\AdminDoctorController')->except('show')->names('doctors');
//        Route::resource('professions', \App\Http\Controllers\Admin\AdminProfessionController::class)->except('show')->names('professions');
        Route::resource('professions', 'Admin\AdminProfessionController')->except('show')->names('professions');
    });
});















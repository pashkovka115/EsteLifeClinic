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


Route::get('/import', 'SuppliersController@import');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


//Админ-панель
Route::group(['middleware'=>'roles','roles'=>['Admin'], 'prefix'=>'admin', 'as'=>'admin.'], function () {
    
    #главная админ-панели
    Route::get('/', 'AdminController@index')->name('index');
    
    //Раздел товары
    Route::group(['prefix'=>'products', 'as'=>'products.'], function(){

        //Работа с товарами
        Route::group(['prefix'=>'products', 'as'=>'products.'], function(){
            Route::get('/', 'ProductsController@index')->name('index');
        });

        //Поставщики
        Route::group(['prefix'=>'suppliers', 'as'=>'suppliers.'], function(){
            Route::get('/', 'SuppliersController@index')->name('index');
        });

    });
});


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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['admin', 'auth'])->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::get('/dashboard', function(){
    	return view('dashboard');
    });

    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::resource('cars', 'CarController');
});

Route::namespace('Frontend')->name('frontend.')->group(function () {
    // Controllers Within The "App\Http\Controllers\Frontend" Namespace
    Route::get('cars', [
    	'uses' => 'CarController@index',
    	'as' => 'cars.index'
    ]);

    Route::name('basket.')->prefix('basket')->group(function(){
        Route::get('/view', [
            'uses' => 'BasketController@viewBasket',
            'as' => 'view'
        ]);

        Route::get('/clear', [
            'uses' => 'BasketController@clear',
            'as' => 'clear'
        ]);

        Route::post('/add', [
            'uses' => 'BasketController@addToBasket',
            'as' => 'add'
        ]);

        Route::post('/update', [
            'uses' => 'BasketController@update',
            'as' => 'update'
        ]);

        Route::get('/{carId}/remove', [
            'uses' => 'BasketController@removeItem',
            'as' => 'remove_item'
        ]);
    });

    Route::post('/order/store', 'OrderController@store');

    Route::get('/test', 'BasketController@test');
});

Route::get('/home', 'HomeController@index')->name('home');

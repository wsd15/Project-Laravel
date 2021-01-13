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
//
//Route::get('/', function () {
//    return view('home');
//});

Route::get('','PizzaController@home');

Route::get('/add-pizza','PizzaController@pizadd');

Route::post('/add-pizza','PizzaController@add')->name('add');

Route::resource('pizza', 'PizzaController');

Auth::routes();

Route::get('/pizza-detail/{id}', 'PizzaController@detail');

Route::post('/pizza-detail/{id}', 'PizzaController@addToCart');

//Route::get('/pizza-update/{id}', function () {
//    return view('pizupd');
//});

//Route::get('/update/{id}','PizzaController@pizupd');
//Route::post('/update/{id}', 'PizzaController@update');


//Route::get('/','App\Http\Controllers\MovieController@index');
//Route::get('/', 'HomeController@index');

Route::get('/view-all-user', 'HomeController@viewuser');

Route::get('/search', 'PizzaController@search');

Route::get('/view-cart', 'CartController@viewCart');

// Route::get('/view-cart/{id}', 'CartController@edit');

// Route::post('/update', 'CartController@update');

Route::delete('/view-cart/{id}', 'CartController@delete');

Route::get('/checkout', 'CartController@checkout');

Route::get('/tr-history', 'CartController@history');

Route::get('/tr-detail/{id}', 'CartController@trdetail');

Route::get('/all-tr-history', 'CartController@alltrhistory');
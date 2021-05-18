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
});

Auth::routes();

//Web Routes


//Provider Routes
Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
Route::get('/home', 'HomeController@index')->name('home');
});


//Admin Routes
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'admin'], function(){
Route::get('/home', 'HomeController@index')->name('home');
  // User Model
  Route::get('/users/{user_type}','AdminController@users')->name('users');
  Route::get('/user/edit/{user}','AdminController@user_edit')->name('user_edit');
  Route::get('user/view/{user}','AdminController@user_view')->name('user_view');
  Route::post('user/update','AdminController@user_update')->name('user_update');
  Route::get('user/create/{user_type}','AdminController@user_create')->name('user_create');
  Route::post('user/store/{user_type}','AdminController@user_store')->name('user_store');

  // Provider Model
  Route::post('/provider/store/{user_type}','ProviderController@store')->name('provider_store');
  Route::post('/provider/update/{user}/{user_type}','ProviderController@update')->name('provider_update');
});
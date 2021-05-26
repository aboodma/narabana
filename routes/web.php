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
})->name('welcome');

Auth::routes();

//Web Routes
Route::get('star/{provider}','HomeController@provider_profile')->name('provider_profile');
Route::get('dashboard','HomeController@customer_dashboard')->name('customer_dashboard');
Route::post('checkout','HomeController@checkout')->name('checkout')->middleware('auth');
Route::post('payment_info','HomeController@payment_info')->name('payment_info')->middleware('auth');
Route::get('service_check','ProviderServiceController@service_check')->name('service_check');



//Admin Routes
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'admin'], function(){
Route::get('/home', 'HomeController@index')->name('home');
  // User Model
  Route::get('/users/{user_type}','AdminController@users')->name('users');
  Route::get('/user/edit/{user}','AdminController@user_edit')->name('user_edit');
  Route::get('user/view/{user}','AdminController@user_view')->name('user_view');
  Route::post('user/update/{user}','AdminController@user_update')->name('user_update');
  Route::get('user/create/{user_type}','AdminController@user_create')->name('user_create');
  Route::post('user/store/{user_type}','AdminController@user_store')->name('user_store');
  Route::delete('user/delete/{user}','AdminController@user_delete')->name('user_delete');

  // Provider Model
  Route::post('/provider/store/{user_type}','ProviderController@store')->name('provider_store');
  Route::post('/provider/update/{user}/{user_type}','ProviderController@update')->name('provider_update');
  Route::delete('provider/delete/{user}/{provider}','ProviderController@destroy')->name('provider_delete');

  // Service Model 
  Route::get('/service/list','ServiceController@index')->name('service_list');
  Route::get('/service/create','ServiceController@create')->name('service_create');
  Route::post('/service/store','ServiceController@store')->name('service_store');
  Route::get('/service/edit/{service}','ServiceController@edit')->name('service_edit');
  Route::post('/service/update/{service}','ServiceController@update')->name('service_update');
  Route::delete('/service/delete/{service}','ServiceController@destroy')->name('service_delete');

  // 
  
});
 
//Provider Routes
Route::group(['prefix'=>'provider','as'=>'provider.','middleware'=>'provider'], function(){
  Route::get('/dashboard','ProviderController@dashboard')->name('dashboard');
  Route::get('/profile','ProviderController@profile')->name('profile');
  Route::get('/services','ProviderController@services')->name('services');
  Route::get('/service/add/{service}','ProviderController@add_service')->name('add_service');
  Route::post('/service/store','ProviderController@store_service')->name('store_service');
  
});

 
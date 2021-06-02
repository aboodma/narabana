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
Route::post('pay','HomeController@pay')->name('pay')->middleware('auth');
Route::get('order_copmlete/{order_id}','HomeController@order_complete')->name('order_complete');
Route::get('be_our_partner/','HomeController@be_our_partner')->name('be_our_partner');
Route::post('provider_request','HomeController@provider_request')->name('provider_request');
Route::get('request_submited/{user}','HomeController@request_submited')->name('request_submited');
Route::get('category/{providerType}','HomeController@FilterByType')->name('FilterByType');
Route::get('categories','HomeController@categories')->name('categories');

//ws routes
Route::get('service_check','ProviderServiceController@service_check')->name('service_check');

//customer routes
Route::group(['prefix'=>'customer','as'=>'customer.','middleware'=>'customer'], function(){
Route::get('profile','CustomerController@profile')->name('profile');
Route::get('myOrders','CustomerController@orders')->name('orders');
Route::get('OrderTracking/{id}','CustomerController@OrderTracking')->name('OrderTracking');
Route::get('videos','CustomerController@videos')->name('videos');
});

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

  // Categories

  Route::get('/categories','ProviderTypeController@index')->name('categories');
  Route::get('/categories/create','ProviderTypeController@create')->name('categories_create');
  Route::post('/categories/store','ProviderTypeController@store')->name('categories_store');
  Route::get('/categories/edit/{providerType}','ProviderTypeController@edit')->name('categories_edit');
  Route::post('/categories/update/{providerType}','ProviderTypeController@update')->name('categories_update');
  Route::delete('/categories/delete/{providerType}','ProviderTypeController@destroy')->name('categories_delete');

  
});
 
//Provider Routes
Route::group(['prefix'=>'provider','as'=>'provider.','middleware'=>'provider'], function(){
  Route::get('/dashboard','ProviderController@dashboard')->name('dashboard');
  Route::get('/profile','ProviderController@profile')->name('profile');
  Route::get('/services','ProviderController@services')->name('services');
  Route::get('/orders/{status}','ProviderController@orders')->name('orders');
  Route::get('/orders/procced/{order}','ProviderController@orders_procced')->name('orders_procced');
  Route::get('/orders/OrderChangeStatus/{status}/{order}','ProviderController@OrderChangeStatus')->name('OrderChangeStatus');
  Route::post('/orders/procced/video','ProviderController@video_order_upload')->name('video_order_upload');
  Route::post('/orders/procced/other','ProviderController@other_order_upload')->name('other_order_upload');
  Route::get('/service/add/{service}','ProviderController@add_service')->name('add_service');
  Route::post('/service/store','ProviderController@store_service')->name('store_service');
  
});

 
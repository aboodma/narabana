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

});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login','ApiController@Login');
Route::post('/userByToken/{token}','ApiController@GetUserByToken');

Route::group( function(){
    Route::post('/acceptOrder','ApiController@AcceptOrder');
    Route::post('/rejectOrder','ApiController@RejectOrder');
});



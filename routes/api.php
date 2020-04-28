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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('prosave', 'API\ProductController@save');  // use for insert data 
//Route::put('proupdate', 'API\ProductController@update');   // use for update data

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('proupdate', 'API\ProductController@update');  //update in auth
Route::post('details', 'API\UserController@details');

});
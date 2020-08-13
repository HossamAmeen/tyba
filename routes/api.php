<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Mobile')->group(function () {
  
        Route::get('/services', 'MobileController@services');
        Route::get('/clinics', 'MobileController@clinics');
        Route::get('/clinic/{id}', 'MobileController@clinic');
        Route::get('/events', 'MobileController@events');
        Route::get('/doctors', 'MobileController@doctors');
        Route::get('/news', 'MobileController@news');
        Route::get('/news/{id}', 'MobileController@show_news');
        Route::get('/about', 'MobileController@about');
        Route::post('/contact', 'MobileController@contact');
        Route::any('/book', 'MobileController@book');
    
});
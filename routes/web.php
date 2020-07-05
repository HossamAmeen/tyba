<?php

//////////////// web
/////// arabic
Route::get('/', 'HomeController@index');
Route::get('/services', 'HomeController@services');
Route::get('/services/{id}', 'HomeController@showService');
Route::get('/clinics', 'HomeController@clinics');
Route::get('/clinic/{id}', 'HomeController@clinic');
Route::get('/events', 'HomeController@events');
Route::get('/doctors', 'HomeController@doctors');
Route::get('/news', 'HomeController@news');
Route::get('/videos', 'HomeController@videos');
Route::get('/news/{id}', 'HomeController@showNews');
Route::get('/about', 'HomeController@about');
Route::any('/contacts', 'HomeController@contact');
Route::any('/book', 'HomeController@book');

/////////// control_panell
/////////////// Admin
Route::prefix('admin')->group(function () {
    /////////// localhost/admin

    Route::namespace('Admin')->group(function () {

        Route::any('/login', 'PrefController@login')->name('login');
        Route::get('logout', 'PrefController@logout');

        Route::any('sendToken', 'PrefController@sendToken');
        Route::any('paswordreset/{id}/{token}', 'PrefController@paswordreset');

        Route::middleware(['middleware' => 'manager'])->group(function () {

            Route::get('/', 'PrefController@index');
            Route::get('books', 'BookController@index')->name('books.index');
            Route::get('books/{id}/delete', 'BookController@destroy');
            Route::get('books/change-status/{id}', 'BookController@changeStatus');
            Route::get('books/download', 'BookController@download');
            Route::resource('user', 'UserController')->middleware('admin');
            Route::get('user/{id}/delete', 'UserController@destroy');
            Route::resource('prefs', 'PrefController')->middleware('admin');
            Route::resource('service', 'ServiceController');
            Route::get('service/{id}/delete', 'ServiceController@destroy');
            Route::resource('video', 'VideoController');
            Route::get('video/{id}/delete', 'VideoController@destroy');
            Route::resource('clinic', 'ClinicController');
            Route::get('clinic/{id}/delete', 'ClinicController@destroy');

            Route::resource('visit-categories', 'VisitCategoryController');
            Route::get('visit-categories/{id}/delete', 'VisitCategoryController@destroy');
            
            Route::resource('doctor', 'DoctorController');
            Route::get('doctor/{id}/delete', 'DoctorController@destroy');
            Route::resource('news', 'NewsController');
            Route::get('news/{id}/delete', 'NewsController@destroy');
            Route::resource('event', 'EventController');
            Route::get('event/{id}/delete', 'EventController@destroy');
        });
    });
});

<?php


//////////////// web 
/////// arabic
    Route::get('/', 'HomeController@index');
    Route::get('/services', 'HomeController@services');
    Route::get('/clinics', 'HomeController@clinics');
    Route::get('/clinic/{id}', 'HomeController@clinic');
    Route::get('/events', 'HomeController@events');
    Route::get('/doctors', 'HomeController@doctors');
    Route::get('/about', 'HomeController@about');
    Route::any('/contacts', 'HomeController@contact');
    Route::any('/book', 'HomeController@book');








/////////// control_panell
/////////////// Admin 
Route::prefix('admin')->group(function () {
    /////////// localhost/admin

    Route::namespace('Admin')->group(function () {

        Route::any('/login','PrefController@login')->name('login');
        Route::get('logout' , 'PrefController@logout');

        Route::middleware(['middleware' => 'manager'])->group(function () {

            Route::get('/', 'PrefController@index');
            Route::resource('user', 'UserController')->middleware('admin');
            Route::get('user/{id}/delete', 'UserController@destroy');
            Route::resource('prefs'    , 'PrefController')->middleware('admin');
            Route::resource('service' , 'ServiceController');
            Route::get('service/{id}/delete', 'ServiceController@destroy');
            Route::resource('clinic' , 'ClinicController');
            Route::get('clinic/{id}/delete', 'ClinicController@destroy');
            Route::resource('doctor', 'DoctorController')->middleware('admin');
            Route::get('doctor/{id}/delete', 'DoctorController@destroy');
            Route::resource('event', 'EventController')->middleware('admin');
            Route::get('event/{id}/delete', 'EventController@destroy');
        });

    });
});





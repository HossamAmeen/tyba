<?php


///////// Admin
Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {
            Route::any('login','PrefController@login')->name('login');
            
            Route::middleware(['middleware' => 'manager'])->group(function () {
                Route::resource('pref','PrefController')->middleware('admin');
                Route::resource('user','UserController')->middleware('admin');
        });
    });
});


<?php

Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::prefix('stores')->group(function () {

        Route::get('/', 'StoreController@index');
        Route::get('/create', 'StoreController@create');
        Route::post('/store', 'StoreController@store');
        Route::get('/{store}/edit', 'StoreController@edit');
        Route::post('/update/{store}', 'StoreController@update');
        Route::post('/destroy/{store}', 'StoreController@destroy');
    });
});

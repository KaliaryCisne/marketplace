<?php

Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::prefix('stores')->group(function () {

        Route::get('/', 'StoreController@index');
        Route::get('create', 'StoreController@create');
        Route::post('store', 'StoreController@store');

    });
});

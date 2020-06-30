<?php

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {
    Route::resource('products', 'ProductController');
});


<?php

use App\User;
use Illuminate\Support\Facades\App;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');
Route::get('/category/{slug}', 'CategoryController@index')->name('category.single');
Route::get('/store/{slug}', 'StoreController@index')->name('store.single');

Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');
    Route::get('remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');
});

Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', 'CheckoutController@index')->name('index');
    Route::post('/proccess', 'CheckoutController@proccess')->name('proccess');
    Route::get('/thanks', 'CheckoutController@thanks')->name('thanks');
});

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
        $basePath = App::basePath();
        foreach(glob($basePath.'/routes/admin/*-routes.php') as $route) {
            include $route;
        }
        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });
});

Auth::routes();

Route::get('/users',  function () {
    return User::all();
});



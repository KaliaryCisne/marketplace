<?php

use App\User;
use Illuminate\Support\Facades\App;

Route::group(['middleware' => ['auth']], function () {

    //Inclui os arquivos de rotas administrativas
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
        $basePath = App::basePath();
        foreach(glob($basePath.'/routes/admin/*-routes.php') as $route) {
            include $route;
        }
    });
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/users',  function () {
    return User::all();
});



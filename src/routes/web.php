<?php

use App\User;
use Illuminate\Support\Facades\App;

Route::get('/', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {

    //Inclui os arquivos de rotas administrativas
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



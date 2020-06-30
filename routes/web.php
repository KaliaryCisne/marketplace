<?php

use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return \App\User::all();
});

$basePath = App::basePath();

//Inclui os arquivos de rotas
foreach(glob($basePath.'/routes/*-routes.php') as $route) {
    include $route;
}

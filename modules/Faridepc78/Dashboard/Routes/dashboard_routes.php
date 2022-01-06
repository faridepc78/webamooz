<?php
Route::group(['namespace' => 'Faridepc78\Dashboard\Http\Controllers', 'middleware' => ['web','auth', 'verified']], function ($router) {
    $router->get('/home', 'DashboardController@home')->name('home');
});

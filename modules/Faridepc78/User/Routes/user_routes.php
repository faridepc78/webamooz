<?php

Route::group([
    'namespace' => 'Faridepc78\User\Http\Controllers',
    'middleware' => 'web'
], function ($router) {
    Auth::routes(['verify' => true]);
});

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {
//    \Spatie\Permission\Models\Permission::create([
//        'name' => 'manage categories',
//    ]);
//
//    \Spatie\Permission\Models\Permission::create([
//        'name' => 'manage role_permissions'
//    ]);

//    auth()->user()->givePermissionTo('manage categories','manage role_permissions');

//    return auth()->user()->permissions;
});

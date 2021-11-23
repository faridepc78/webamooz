<?php
Route::group(["namespace" => "Faridepc78\RolePermissions\Http\Controllers", 'middleware' => ['web', 'auth', 'verified']], function ($router) {
    $router->resource('role-permissions', 'RolePermissionsController')->middleware('permission:manage role_permissions');
});

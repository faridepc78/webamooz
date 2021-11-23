<?php

namespace Faridepc78\RolePermissions\Http\Controllers;

use Faridepc78\Category\Responses\AjaxResponses;
use Faridepc78\RolePermissions\Http\Requests\RoleRequest;
use Faridepc78\RolePermissions\Http\Requests\RoleUpdateRequest;
use Faridepc78\RolePermissions\Repositories\PermissionRepo;
use Faridepc78\RolePermissions\Repositories\RoleRepo;

class RolePermissionsController
{
    private $roleRepo;
    private $permissionRepo;

    public function __construct(RoleRepo $roleRepo, PermissionRepo $permissionRepo)
    {
        $this->roleRepo = $roleRepo;
        $this->permissionRepo = $permissionRepo;
    }

    public function index()
    {
        $roles = $this->roleRepo->all();
        $permissions = $this->permissionRepo->all();
        return view('RolePermissions::index', compact('roles', 'permissions'));
    }

    public function store(RoleRequest $request)
    {
        return $this->roleRepo->create($request);
    }

    public function edit($roleId)
    {
        $role = $this->roleRepo->findById($roleId);
        $permissions = $this->permissionRepo->all();
        return view("RolePermissions::edit", compact('role', 'permissions'));
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        $this->roleRepo->update($id, $request);
        return redirect(route('role-permissions.index'));
    }

    public function destroy($roleId)
    {
        $this->roleRepo->delete($roleId);
        return AjaxResponses::SuccessResponse();
    }
}

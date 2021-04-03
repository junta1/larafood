<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\RolesPermissions;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    protected $role;
    protected $permission;
    protected $rolesPermissions;

    public function __construct(RolesPermissions $rolesPermissions, Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
        $this->rolesPermissions = $rolesPermissions;
    }

    public function index()
    {
        $roles = 1;
        $consulta = $this->rolesPermissions
            ->with([
                'roles',
                'permissions'
            ])
            ->whereHas('roles', function ($query) use ($roles) {
                $query->where('id_roles', '=', $roles);
            })
            ->get();

        return $consulta;
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $this->rolesPermissions->status = $input['status'];
        $this->rolesPermissions->id_roles = $input['idRoles'];
        $this->rolesPermissions->id_permissions = $input['idPermissions'];

        $this->rolesPermissions->save();

        return $this->rolesPermissions;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesPermissions extends Model
{
    protected $table = 'roles_permissions';

    protected $fillable = [
        'status',
        'id_roles',
        'id_permissions'
    ];

    public $timestamps = false;

    public function roles()
    {
        return $this->belongsTo(Role::class, 'id_roles');
    }

    public function permissions()
    {
        return $this->belongsTo(Permission::class, 'id_permissions');
    }
}

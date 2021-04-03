<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $primaryKey = 'id_permissions';

    protected $table = 'permissions';

    protected $fillable = [
        'id_permissions',
        'name'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'id_roles';

    protected $table = 'roles';

    protected $fillable = [
        'id_roles',
        'name'
    ];
}

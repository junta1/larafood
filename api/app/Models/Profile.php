<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = ['name', 'description'];

    /**
     * Get Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Permission not linked with this profile
     */
    public function permissionsAvailable()
    {
        $permissions = Permission::whereNotIn('id', function ($query) {
            $query->from('permission_profile')
                ->select('permission_profile.permission_id')
                // ->whereRaw("permission_profile.profile_id={$this->id}");
                ->where('permission_profile.profile_id', $this->id);
        })->paginate();
        
        return $permissions;
    }
}

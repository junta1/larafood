<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = [
        'name',
        'url',
        'price',
        'description'
    ];

    public function details()
    {
        return $this->hasMany(DetailsPlan::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function search($filter)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('description', 'LIKE', "%{$filter}%")
            ->paginate();

        return $results;
    }

     /**
     * Profiles not linked with this plan
     */
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('id', function ($query) {
            $query->from('plan_profile')
                ->select('plan_profile.profile_id')
                // ->whereRaw("permission_profile.profile_id={$this->id}");
                ->where('plan_profile.plan_id', $this->id);
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter) {
                    $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
                }
            })
            ->paginate();

        return $profiles;
    }
}

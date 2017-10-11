<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable=[
        'name',
        'description',
    ];

    public function announcement(){
        return $this->hasMany(Announcement::class, 'organization_id', 'id');
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'organization_members', 'org_id','user_id');
    }
}

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

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

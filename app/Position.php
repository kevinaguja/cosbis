<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable=[
        'name',
        'description',
    ];

    public function candidate(){
        return $this->hasMany(Candidate::class, 'position_id', 'id');
    }
}

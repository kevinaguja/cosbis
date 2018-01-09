<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $table='parties';
    protected $fillable=[
        'name',
        'slogan',
        'description',
        'banner',
        'logo',
    ];

    public function candidates(){
        return $this->hasMany(Candidate::class,'party_id','id');
    }
}

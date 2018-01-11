<?php

namespace App;

use App\Cosbis\Filters\ElectionFilters;
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
        return $this->hasMany(Candidate::class,'party','id');
    }

    public function scopeFilter($query, ElectionFilters $filters)
    {
        return $filters->apply($query);
    }
}

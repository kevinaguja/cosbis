<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $fillable = [
        "code",
        "description",
    ];
    public function user()
    {
        return $this->hasMany(User::class, 'program', 'id');
    }
}

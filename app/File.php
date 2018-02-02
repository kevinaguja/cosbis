<?php

namespace App;

use App\Cosbis\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //

    protected $fillable = [
        'user_id',
        'visibility',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }
}

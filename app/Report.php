<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    //
    use SoftDeletes;

    protected $fillable=[
        'event_id',
        'reported_user_id',
        'user_id',
        'type',
        'description',
        'read',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function reported_user()
    {
        return $this->belongsTo(User::class, 'reported_user_id', 'id');
    }
}

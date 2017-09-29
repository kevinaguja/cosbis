<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventComment extends Model
{
    protected $table= 'event_comments';

    protected $fillable=[
        'user_id',
        'event_id',
        'comment',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function event(){
        return $this->belongsTo(Discussion::class, 'event_id', 'id');
    }
}

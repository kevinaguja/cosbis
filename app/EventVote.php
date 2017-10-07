<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventVote extends Model
{
    protected $table= 'event_votes';


    protected $fillable=[
        'event_id',
        'user_id',
        'vote',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function event(){
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}

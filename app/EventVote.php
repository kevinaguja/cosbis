<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventVote extends Model
{
    use SoftDeletes;
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table= 'events';


    protected $fillable=[
        'user_id',
        'title',
        'description',
        'status',
        'time',
        'date',
        'location',
        'type',
        'theme',
        'img',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function eventVote(){
        return $this->hasMany(EventVote::class, 'event_id', 'id');
    }

    public function comment(){
        return $this->hasMany(EventComment::class, 'event_id', 'id');
    }
}

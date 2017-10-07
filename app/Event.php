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

    public function votes(){
        return $this->hasMany(EventVote::class, 'event_id', 'id');
    }

    public function huzzahs()
    {
        return $this->hasMany(EventVote::class, 'event_id', 'id')->where('vote', '=', 1)->get();
    }

    public function boos()
    {
        return $this->hasMany(EventVote::class, 'event_id', 'id')->where('vote', '=', 0)->get();
    }

    public function comments(){
        return $this->hasMany(EventComment::class, 'event_id', 'id');
    }

    public function checkForVotes()
    {
        return $this->votes()->where('user_id', '=', auth()->user()->id)->exists();
    }
}

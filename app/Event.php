<?php

namespace App;

use App\Cosbis\Filters\EventFilters;
use App\Cosbis\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use MongoDB\Driver\Query;

class Event extends Model
{
    use SoftDeletes;
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
        'organization_id',
    ];

    protected $dates= [
	'date',
    ];

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function votes(){
        return $this->hasMany(EventVote::class, 'event_id', 'id');
    }

    public function huzzahs()
    {
        return $this->hasMany(EventVote::class, 'event_id', 'id')->where('vote', '=', 1);
    }

    public function boos()
    {
        return $this->hasMany(EventVote::class, 'event_id', 'id')->where('vote', '=', 0);
    }

    public function comments(){
        return $this->hasMany(EventComment::class, 'event_id', 'id');
    }

    public function checkForVotes()
    {
        return $this->votes()->where('user_id', '=', auth()->user()->id)->exists();
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
}

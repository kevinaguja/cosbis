<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable=[
        'user_id',
        'position_id',
        'slogan',
        'statement',
        'party',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function position(){
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function election_party(){
        return $this->belongsTo(Party::class, 'party', 'id');
    }

    public function electionBoard(){
        return $this->hasMany(ElectionBoard::class, 'candidate_id', 'id');
    }

    public function userVote(){
        return $this->hasMany(UserVote::class, 'candidate_id', 'id');
    }
}

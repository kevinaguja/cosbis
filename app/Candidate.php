<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable=[
        'user_id',
        'position_id',

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function position(){
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function electionBoard(){
        return $this->hasMany(ElectionBoard::class, 'candidate_id', 'id');
    }

    public function userVote(){
        return $this->hasMany(UserVote::class, 'candidate_id', 'id');
    }
}

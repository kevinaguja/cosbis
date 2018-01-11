<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVote extends Model
{
    protected $fillable=[
        'user_id',
        'position_id',
        'candidate_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
}

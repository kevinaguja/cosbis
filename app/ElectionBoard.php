<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectionBoard extends Model
{
    protected $table= 'election_boards';


    protected $fillable=[
        'candidate_id',
        'position_id',
        'vote',
    ];

    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
}

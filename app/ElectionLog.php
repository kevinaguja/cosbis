<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ElectionLog extends Model
{
    //
    use SoftDeletes;
    protected $table= 'election_log';

    protected $fillable=[
        'date_ended',
    ];
}

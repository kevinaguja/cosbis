<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'user_id',
        'discussion_id',
        'comment',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function discussion(){
        return $this->belongsTo(Discussion::class, 'discussion_id', 'id');
    }
}

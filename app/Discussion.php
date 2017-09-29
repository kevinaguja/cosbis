<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable=[
        'status',
        'title',
        'description',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'discussion_id', 'id');
    }
}

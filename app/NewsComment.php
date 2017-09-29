<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    protected $table= 'news_comments';

    protected $fillable=[
        'user_id',
        'news_id',
        'comment',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function news(){
        return $this->belongsTo(Discussion::class, 'news_id', 'id');
    }
}

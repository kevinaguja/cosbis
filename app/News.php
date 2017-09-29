<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table= 'news';


    protected $fillable=[
        'author_id',
        'title',
        'news',
        'img',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function comment(){
        return $this->hasMany(NewsComment::class, 'news_id', 'id');
    }
}

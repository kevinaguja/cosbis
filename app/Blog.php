<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'author_id',
        'title',
        'blog',
        'img',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function comment(){
        return $this->hasMany(BlogComment::class, 'blog_id', 'id');
    }
}

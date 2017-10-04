<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'is_verified',
        'role_id',
        'email',
        'is_suspended',
        'remember_token',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function is_student()
    {
        return $this->role_id === 3;
    }

    public function is_admin()
    {
        return $this->role_id === 2;
    }

    public function is_superadmin()
    {
        return $this->role_id === 1;
    }

    public function events(){
        return $this->hasMany(Event::class, 'user_id', 'id');
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function discussion(){
        return $this->hasMany(Discussion::class, 'user_id', 'id');
    }

    public function announcement(){
        return $this->hasMany(Announcement::class, 'user_id', 'id');
    }

    public function candidate(){
        return $this->hasMany(Candidate::class, 'user_id', 'id');
    }

    public function userVote(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function news(){
        return $this->hasMany(News::class, 'author_id', 'id');
    }

    public function feedback(){
        return $this->hasMany(Feedback::class, 'user_id', 'id');
    }

    public function blog(){
        return $this->hasMany(Blog::class, 'author_id', 'id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function eventVote(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function blogComment(){
        return $this->hasMany(BlogComment::class, 'user_id', 'id');
    }

    public function newsComment(){
        return $this->hasMany(NewsComment::class, 'user_id', 'id');
    }

    public function eventComment(){
        return $this->hasMany(EventComment::class, 'user_id', 'id');
    }
}

<?php

namespace App;

use App\Cosbis\Filters\AnnouncementFilters;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable=[
        'restriction',
        'title',
        'announcement',
        'user_id',
    ];

    public function scopeFilter($query, AnnouncementFilters $filters){
        return $filters->apply($query);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function organization(){
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
}

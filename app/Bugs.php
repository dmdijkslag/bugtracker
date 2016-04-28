<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bugs extends Model
{
	protected $primaryKey = 'bug_id';

    protected $fillable = [
        'project_id', 
        'user_id',
        'status_id', 
        'subject',
        'url',
        'description',
        'priority_id',
        'assigned_to_user_id',
        'total_time_spent',
        'is_public',
        'finished_at',
        'published_at',
    ];

    protected $dates = ['published_at', 'finished_at'];

    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function setPublishedAtAttribute($date) {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * Toont wie de de bug heeft geplaatst
     * @return eloquent/relation/belongsTo
     */
    public function publisher() {
        return $this->belongsTo('App\User');
    }
/*?????????*/
   public function project() {
        return $this->belongsTo('App\Projects');
    }

    public function comments() {
        return $this->hasMany('App\Comments');
    }

}

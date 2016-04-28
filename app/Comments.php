<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comments extends Model
{
	protected $primaryKey = 'comment_id';

    protected $fillable = [
        'bug_id', 
        'user_id',
        'date', 
        'comment',
        'status_id_from',
        'status_id_to',
        'time_spent',
        'comment_url',
        'description',
    ];

    protected $dates = ['date'];

    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function setPublishedAtAttribute($date) {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function bug() {
        return $this->belongsTo('App\Bugs');
    }

}

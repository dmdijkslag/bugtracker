<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Projects extends Model
{
	protected $primaryKey = 'project_id';

    protected $fillable = [
        'title', 
        'is_deleted', 
    ];

    public function scopeGetActiveProjecs($query) {
        $query->where('is_deleted', '=', 0);
    }

    public function scopeIsDeleted($query) {
        $query->where('is_deleted', '=', 1);
    }

/*?????????*/
    public function bugs() {
        return $this->hasMany('App\Bugs');
    }

    public function users() {
        return $this->belongsToMany('App\User');
    }

}

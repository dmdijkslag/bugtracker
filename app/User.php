<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'is_superadmin',
        'is_developer',
        'is_privateviewer',
        'settings',
        'is_deleted',
        'show_hours_spent',
        'last_login',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function bugs() {
        return $this->hasMany('App\Bugs');
    }

    public function projects() {
        return $this->belongsToMany('App\Projects');
    }

    public function getProjectsListAttribute() {
        return $this->projects->lists('project_id');
    }

    public function getSelectedProjects() {
        return $this->projects->lists('project_id');
    }

    public function scopegetDevelopers($query) {
        $query->where('is_developer', '=', 1);
    }

    public function getUserName() {
        return $this->name;
    }

    public function isSuperAdmin() {
        return $this->is_superadmin;
    }

    public function isDeveloper() {
        return $this->is_developer;
    }

    public function isPrivateViewer() {
        return $this->is_privateviewer;
    }
}
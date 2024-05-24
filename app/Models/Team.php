<?php

namespace App\Models;

use Laratrust\Models\Team as LaratrustTeam;

class Team extends LaratrustTeam
{
    public $guarded = [];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}

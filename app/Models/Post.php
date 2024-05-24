<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'team_id',
        'image_url',
        'description',
        'author',
    ];

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function chapters(){
        return $this->hasMany(Chapter::class);
    }

}

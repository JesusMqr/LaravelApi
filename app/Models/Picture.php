<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable=[
        'chapter_id',
        'image_url',
    ];

    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }
}

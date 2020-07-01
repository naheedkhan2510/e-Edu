<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video_table extends Model
{
    protected $table = 'video_table';
    
    protected $fillable = [
        'Type', 'url',
    ];  
}

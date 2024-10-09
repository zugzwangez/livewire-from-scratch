<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    use HasFactory;


    protected $fillable = [
        'title', 
        'content', 
        'published',
        'notifications'
    ];

    // Casting notifications as array, Laravel is going to store the array as json structure in the database, then we do not need to encode and decode manually.

    protected $casts = [
        'published' => 'boolean',
        'notifications' => 'array'
    ];

}

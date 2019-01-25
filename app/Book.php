<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'category_id', 
        'name', 
        'keyword', 
        'detail', 
        'writer', 
        'image', 
        'file', 
        'user_id',
        'read'
    ];
}

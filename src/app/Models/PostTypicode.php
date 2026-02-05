<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTypicode extends Model
{
    protected $table = 'posts_typicode';

    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];
}
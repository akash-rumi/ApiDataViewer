<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostPlaceholderOrg extends Model
{
    protected $table = 'posts_placeholder_org';

    protected $fillable = [
        'slug',
        'url',
        'title',
        'content',
        'image',
        'thumbnail',
        'status',
        'category',
        'published_at',
        'updated_at_api',
        'user_id'
    ];
}
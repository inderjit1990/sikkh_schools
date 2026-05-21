<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $casts = [
        'status' => PostStatus::class,
    ];
    
    protected $fillable = [
        'title',
        'content',
        'school_id',
        'image',
        'added_by',
        'status',
        'published_at',
        'meta_data',
        'category_id'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{

    protected $fillable = [
        'image',
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'published_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function claps()
    {
        return $this->hasMany(Clap::class);
    }

    public function readTime($wordsPerMinute = 100)
    {
        // Assuming an average reading speed of 100 words per minute
        $wordCount = str_word_count(strip_tags($this->content));
        $readTime = ceil($wordCount / $wordsPerMinute); // in minutes

        return max(1, $readTime);
    }

    public function imageUrl()
    {
        return $this->image ? Storage::url($this->image) : null;
    }
}

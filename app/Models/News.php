<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends BaseModel
{
    use HasFactory;

    protected $table = "news";

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'CategoryId');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'UserId');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, "news_tags", "NewsId", "TagId");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'NewsId', 'id');
    }
}

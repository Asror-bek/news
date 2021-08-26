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
}

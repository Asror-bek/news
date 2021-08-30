<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends BaseModel
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'UserId');
    }

    public function news()
    {
        return $this->hasOne(News::class, 'id', 'NewsId');
    }
}

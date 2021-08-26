<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    use HasFactory;

    public function news()
    {
        return $this->hasOne(News::class, "CategoryId", "id");
    }
}
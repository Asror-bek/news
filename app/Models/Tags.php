<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends BaseModel
{
    use HasFactory;

    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}

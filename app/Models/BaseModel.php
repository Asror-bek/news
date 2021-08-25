<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = ["id"];

    const CREATED_AT = "CreatedAt";

    const UPDATED_AT = "UpdatedAt";
}

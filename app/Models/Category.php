<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function treads()
    {
        return $this->belongsTo(Tread::class, 'id', 'category_id');
    }
}

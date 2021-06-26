<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Ad extends Model
{
    use HasFactory;

    public function getFlierUrlAttribute()
    {
        return $this->ad_image_path ? Storage::url($this->ad_image_path) : null;
    }
}

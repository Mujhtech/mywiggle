<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class TreadVideoPath extends Model
{
    use HasFactory;

    public function getVideoUrlAttribute()
    {
        return $this->video_path ? Storage::url($this->video_path) : null;
    }
}

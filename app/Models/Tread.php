<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Tread extends Model
{
    use HasFactory;



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tread_video_path()
    {
        return $this->belongsTo(TreadVideoPath::class, 'id', 'tread_id');
    }

    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image ? Storage::url($this->featured_image) : 'https://ui-avatars.com/api/?name='.urlencode($this->title).'&color=7F9CF5&background=EBF4FF';
    }

    public function getShortContentAttribute()
    {
        return substr($this->content, 0, 150);
    }
}

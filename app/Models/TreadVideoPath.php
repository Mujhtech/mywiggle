<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreadVideoPath extends Model
{
    use HasFactory;


    public function tread()
    {
        return $this->belongsTo(User::class, 'tread_id', 'id');
    }
}

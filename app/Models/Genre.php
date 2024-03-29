<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function comic()
    {
        return $this->belongsToMany(Comic::class, 'comic_genre');
    }
}

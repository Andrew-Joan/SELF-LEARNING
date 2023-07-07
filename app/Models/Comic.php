<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function genre()
    {
        return $this->belongsToMany(Genre::class, 'comic_genre');
    }

    public function release()
    {
        return $this->belongsTo(Release::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'bookmarks');
    }
}

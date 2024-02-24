<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class upload extends Model
{
    use HasFactory;
    protected $table="upload";
    protected $fillable = [
        'name',
        'image',
        'deskripsi',
        'user_id',
        'album_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Like()
    {
        return $this->hasMany(Like::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getLikesCountAttribute()
    {
        return $this->like->count();
    }
    public function userLiked()
    {
        return $this->like->where('user_id', Auth::id())->isNotEmpty();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class album extends Model
{
    use HasFactory;
    protected $table="albums";
    protected $fillable = [
        'name',
        'user_id',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function upload()
    {
        return $this->hasMany(Upload::class);
    }

    public function comment()
    {
        return $this->hasMany(comment::class);
    }

    public function Like()
    {
        return $this->hasMany(Like::class);
    }

// Dalam model Upload.php
public static function boot()
{
    parent::boot();

    static::deleting(function ($upload) {
        // Hapus file fisik terkait dengan upload
        Storage::delete('public/article/' . $upload->image);

    });
}

}

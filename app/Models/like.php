<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'likes';
    protected $fillable = [
        'user_id', 'album_id', 'upload_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Albums()
    {
        return $this->belongsTo(Album::class);
    }
    public function Photos()
    {
        return $this->belongsTo(upload::class);
    }
}

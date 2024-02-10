<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divelog extends Model
{
    use HasFactory;

    protected $fillable = ['divelog'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        // 🔽 追加
    public function liked()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}

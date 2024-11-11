<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    // titleとcontentの大量割り当てを許可
    protected $fillable = ['title', 'content'];

         // コメントとのリレーションを定義
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

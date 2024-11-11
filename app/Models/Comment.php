<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['thread_id', 'content', 'name', 'user_id'];


    // 指定されたスレッド内での特定ユーザーの投稿回数を取得
    public function getUserPostCount($threadId, $userId)
    {
        return Comment::where('thread_id', $threadId)
            ->where('user_id', $userId)
            ->count();
    }
}

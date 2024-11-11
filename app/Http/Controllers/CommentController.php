<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // コメントの保存
    public function store(Request $request, $threadId)
    {
        $request->validate(['content' => 'required']);

        // ユーザーIDをセッションから取得、存在しない場合は新規生成
        $userId = session('user_id') ?? substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
        session(['user_id' => $userId]);

        // コメントの作成
        Comment::create([
            'thread_id' => $threadId,
            'content' => $request->content,
            'name' => $request->name ?? '名無しさん',
            'user_id' => $userId,
        ]);

        return redirect()->route('threads.show', $threadId);
    }

    // 指定ユーザーのコメント一覧表示
    public function userComments($threadId, $userId)
    {
        $thread = Thread::findOrFail($threadId);
        $comments = Comment::where('thread_id', $threadId)
            ->where('user_id', $userId)
            ->get();

        return view('threads.user_comments', compact('thread', 'comments'));
    }
}

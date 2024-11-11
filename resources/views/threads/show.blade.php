<!-- resources/views/threads/show.blade.php -->

<h1>{{ $thread->title }}</h1>
<p>{{ $thread->content }}</p>

<a href="{{ route('threads.index') }}">スレッド一覧に戻る</a>

<hr>

<!-- コメント表示部分とフォームを後ほど追加します -->
<h2>コメント</h2>
<ul>
    @forelse ($thread->comments as $index => $comment)
        <li>
            <!-- コメント番号を4桁にゼロ埋め -->
            <strong>#{{ str_pad($index + 1, 4, '0', STR_PAD_LEFT) }}</strong>

            <!-- ユーザーIDと書き込み回数の表示 -->
            ID:
            @if ($comment->user_id)
                <a href="{{ route('user.comments', ['thread' => $thread->id, 'user_id' => $comment->user_id]) }}">
                    {{ $comment->user_id }}
                </a>
            @else
                名無しさん
            @endif

            <!-- 日付と時間 -->
            {{ $comment->created_at->format('Y-m-d H:i:s') }} -

            <!-- コメント内容 -->
            {{ $comment->content }}
        </li>
    @empty
        <li>コメントはまだありません。</li>
    @endforelse
</ul>

<hr>

<h3>書き込み</h3>
<form action="{{ route('comments.store', $thread->id) }}" method="POST">
    @csrf
    <div>
        <label for="name">名前（任意）:</label>
        <input type="text" name="name" id="name" placeholder="名無しさん">
    </div>
    <div>
        <label for="content">コメント内容:</label>
        <textarea name="content" required></textarea>
    </div>
    <button type="submit">投稿</button>
</form>

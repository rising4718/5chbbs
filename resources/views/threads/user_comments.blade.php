<h1>{{ $thread->title }} の {{ $comments->first()->user_id ?? '名無しさん' }} さんの書き込み一覧</h1>

<ul>
    @foreach ($comments as $index => $comment)
        <li>
            <strong>#{{ str_pad($index + 1, 4, '0', STR_PAD_LEFT) }}</strong>
            {{ $comment->created_at->format('Y-m-d H:i:s') }} -
            {{ $comment->content }}
        </li>
    @endforeach
</ul>

<a href="{{ route('threads.show', $thread->id) }}">戻る</a>

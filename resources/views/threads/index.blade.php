<!-- resources/views/threads/index.blade.php -->

<h1>スレッド一覧</h1>
<a href="{{ route('threads.create') }}">新しいスレッドを作成する</a>

<ul>
    @foreach ($threads as $thread)
        <li>
            <h2><a href="{{ route('threads.show', $thread->id) }}">{{ $thread->title }}</a></h2>
            <p>{{ $thread->content }}</p>
        </li>
    @endforeach
</ul>

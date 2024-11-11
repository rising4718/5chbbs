<!-- resources/views/threads/create.blade.php -->

<h1>新しいスレッドを作成</h1>
<form action="{{ route('threads.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="content">内容</label>
        <textarea name="content" id="content" required></textarea>
    </div>
    <button type="submit">投稿</button>
</form>

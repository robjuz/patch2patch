@extends('index')

@section('content')
    <h1> Księga gości </h1>

    @foreach($comments as $comment)
        <p> {{ $comment->created_at }} : {{ $comment->created_by or '' }}</p>
        <p> {{ $comment->text or '' }}</p>
        <hr>
    @endforeach

    {{ $comments->links() }}

    <h3>Zostaw nam swój komentarz</h3>
    <form method="POST" action="{{ route('comment.store') }}">
        <div class="form-group">
            <label>Twoje imię</label>
            <input type="text" name="created_by" required/>
        </div>
        <div class="form-group">
            <label>Twój komentarz</label>
            <textarea name="text" rows="5" style="resize: vertical" required></textarea>
        </div>
        <input type="submit" />
    </form>

@endsection
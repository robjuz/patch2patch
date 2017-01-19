@extends('index')

@section('content')
    <h1> Księga gości </h1>

    @foreach($comments as $comment)
      <div class="comment">
        <p>
          <span class="author">{{ $comment->created_by or '' }}</span>
          <span class="date">{{ date('d.m.Y \o H:i', strtotime($comment->created_at)) }}</span>
        </p>
        <p class="text">
          {{ $comment->text or '' }}
        </p>
        <hr>
      </div>
    @endforeach

    <div>
        {{ $comments->links() }}
    </div>

    <div id="new-comment">
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
          <button type="submit"> Zapisz </button>
      </form>
    </div>

@endsection

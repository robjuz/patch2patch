@extends('index')

@section('content')
    <h1>@lang('translations.guest_book') </h1>

    @foreach($comments as $comment)
      <div class="comment">
        <p>
          <span class="author">{{ $comment->created_by or '' }}</span>
          <span class="date">{{ $comment->created_at->format(trans('translations.date_format')) }}</span>
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
      <h3>@lang('translations.leave_comment')</h3>
      <form method="POST" action="{{ route('comment.store') }}">
          <div class="form-group">
              <label>@lang('translations.your_name')</label>
              <input type="text" name="created_by" required/>
          </div>
          <div class="form-group">
              <label>@lang('translations.your_comment')</label>
              <textarea name="text" rows="5" style="resize: vertical" required></textarea>
          </div>
          <button type="submit"> @lang('translations.save') </button>
      </form>
    </div>

@endsection

@extends('index')

@section('content')
<div id="details">
	<h1>
		{{ $patchwork->title or 'Patchwork '.$patchwork->id }}
	</h1>
	<div class="date">
		dodano: <span>{{ $patchwork->created_at->format('d.m.Y') }}</span>
	</div>
	<div id="preview">
		<?= $patchwork->content ?>
	</div>

	<div id="fabric-list">
		<h2>Materiały:</h2>
        @foreach( $patchwork->fabrics as $fabric)
            <div class="fabric">
                <svg height="0">
                    <defs>
                      <pattern id="fabric-{{ $fabric->id }}" data-id="{{ $fabric->id }}" x="0" y="0" width="1" height="1">
                        <image width="100" height="100"
                               xlink:href="{{ $fabric->image }}"/>
                      </pattern>
                  </defs>
                </svg>
    			<div class="fabric-thumbnail"style="
                    background-color: {{ $fabric->color }};
                    <?= is_file(public_path().$fabric->image) ? 'background-image: url(' . $fabric->image . '); background-size: contain;' : '' ?>"></div>
    			<span class="fabric-color">{{ $fabric->title }}</span>
    		</div>
        @endforeach
	</div>
	<div class="clearfix">
		<svg height="0">
			@foreach( $patchwork->fabrics as $fabric)
				<defs>
				  <pattern id="fabric-{{ $fabric->id }}" x="0" y="0" width="1" height="1">
					<image width="100" height="100"
						   xlink:href="{{ $fabric->image }}"/>
				  </pattern>
			  </defs>
			@endforeach
		</svg>
	</div>


	<h2 id="comments"> Wasze komentarze </h2>
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
        {{ $comments->fragment('comments')->links() }}
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
</div>
@endsection()

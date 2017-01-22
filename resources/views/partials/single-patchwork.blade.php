<div class="single-patchwork">
	<div class="title">
		<a href="{{ route('patchwork.show', [$patchwork, $patchwork->slug]) }}">
			{{ $patchwork->title or 'Patchwork '.$patchwork->id }}
		</a>
	</div>
	<div class="date">
		@lang('translations.added'): <span>{{ $patchwork->created_at->format(trans('translations.date_format')) }}</span>
	</div>
	<a href="{{ route('patchwork.show', [$patchwork, $patchwork->slug]) }}">
		<div class="preview-wrapper">
			<?= $patchwork->content ?>
		</div>
	</a>
	<div class="statistics">
		<div class="views">
			@lang('translations.views', ['views' => $patchwork->views])
			@if (!in_array($patchwork->id, session()->get('likes',[])))
				<form class="like-form" action="{{ route('patchwork.like', $patchwork) }}" method="POST">
					<button type="submit">Like</button>
				</form>
			@endif
		</div>
		<div class="likes">@lang('translations.likes', ['likes' => $patchwork->likes])</div>
	</div>
</div>

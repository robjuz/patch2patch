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
		<div class="views">@lang('translations.views', ['views' => $patchwork->views])</div>
		<div class="likes">@lang('translations.likes', ['likes' => $patchwork->likes])</div>
		<div class="comments">@lang('translations.comments', ['likes' => $patchwork->comments_count])</div>
	</div>
	@if (!in_array($patchwork->id, session()->get('likes',[])))
		<form class="like-form" action="{{ route('patchwork.like', $patchwork) }}" method="POST">
			<button type="submit">
				<svg width="27" height="27">
					<circle class="face" cx="13" cy="13" r="12" />
					<circle class="cheek" cx="8" cy="14" r="3" />
					<circle class="cheek" cx="18" cy="14" r="3" />
					<circle class="eye" cx="9" cy="10" r="2.5" />
					<circle class="eye" cx="17" cy="10" r="2.5" />
					<path class="mouth" d="M10,17 C8,20 18,20 16,17" />
					<path class="smile" d="M8,16 C8,22 18,22 18,16" />
				</svg>
			</button>
		</form>
	@endif
</div>

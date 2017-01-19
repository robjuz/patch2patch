<div class="single-patchwork">
	<div class="title">
		<a href="{{ route('patchwork.show', $patchwork) }}">
			{{ $patchwork->title or 'Patchwork '.$patchwork->id }}
		</a>
	</div>
	<div class="date">
		@lang('translations.added'): <span>{{ $patchwork->created_at->format(trans('translations.date_format')) }}</span>
	</div>
	<a href="{{ route('patchwork.show', $patchwork) }}">
		<div class="preview-wrapper">
			<?= $patchwork->content ?>
		</div>
	</a>
	<div class="statistics">
		<div class="views">@lang('translations.views', ['views' => $patchwork->views ?? 0])</div>
		<div class="likes">@lang('translations.likes', ['likes' => $patchwork->likes ?? 0])</div>
	</div>
</div>

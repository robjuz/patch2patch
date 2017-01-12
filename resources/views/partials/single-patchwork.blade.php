<div class="single-patchwork">
	<div class="title">
		<a href="{{ route('patchwork.show', $patchwork) }}">
			{{ $patchwork->title or 'Patchwork '.$patchwork->id }}
		</a>
	</div>
	<div class="date">dodano: <span>{{ $patchwork->created_at->format('d.m.Y') }}</span></div>
	<a href="{{ route('patchwork.show', $patchwork) }}">
		<div class="preview-wrapper">
			<?= $patchwork->content ?>
		</div>
	</a>
	<div class="statistics">
		<div class="views">wyświetleń: {{ $patchwork->views or 0 }}</div>
		<div class="likes">polubień: {{ $patchwork->likes or 0 }}</div>
	</div>
</div>

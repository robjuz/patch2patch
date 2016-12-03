@extends('index')

@section('content')
<div id="gallery">
	<h1>Galeryjka</h1>
	@foreach( $patchworks as $patchwork )
	<div class="single-patchwork-wrapper">
		<div class="single-patchwork">
			<h2 class="title">
				<a href="{{ route('patchwork.show', $patchwork) }}">
					{{ $patchwork->title or 'Patchwork '.$patchwork->id }}
				</a>
			</h2>
			<div class="date">dodano: <span>{{ $patchwork->created_at->format('d.m.Y') }}</span></div>
			<div class="statistics">
				<div class="views">wyświetleń: {{ $patchwork->views or 0 }}</div>
				<div class="likes">polubień: {{ $patchwork->likes or 0 }}</div>
				<div class="clearfix"></div>
			</div>
			<a href="{{ route('patchwork.show', $patchwork) }}">
				<div class="preview-wrapper">
					<?= $patchwork->content ?>
				</div>
			</a>
		</div>
	</div>
	@endforeach
	<svg height="0">
		@foreach( $fabrics as $fabric)
			<defs>
				<pattern id="fabric-{{ $fabric->id }}" x="0" y="0" width="1" height="1">
					<image width="100" height="100"
						   xlink:href="{{ $fabric->image }}"/>
				</pattern>
			</defs>
		@endforeach
	</svg>
</div>
@endsection()

@extends('index')

@section('content')
<div id="gallery">
	<h1>Galeryjka</h1>
	@foreach( $patchworks->chunk($patchworks->count() / 4) as $chunk )
		<div class="column">
			@each('partials.single-patchwork', $chunk, 'patchwork')
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
	<div id="pagination">
		{{ $patchworks->links() }}
	</div>
</div>

@endsection()

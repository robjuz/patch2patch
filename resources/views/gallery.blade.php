@extends('index')

@section('content')
<div id="gallery">
	<h1>Galeryjka</h1>
	@foreach( $patchworks->chunk(6) as $chunk )
		<div class="column">
		@foreach($chunk as $patchwork)	
			@include('partials.single-patchwork')
		@endforeach
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

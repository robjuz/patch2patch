@extends('index')

@section('content')
<div>
	<div class="single-patchwork">
		<svg height="0">
			@foreach( $patchwork->fabrics as $fabric)
	            <defs>
	              <pattern id="fabric-<% $fabric->id %>" x="0" y="0" width="1" height="1">
	                <image width="100" height="100"
	                       xlink:href="<% $fabric->image %>"/>
	              </pattern>
	          </defs>
	        @endforeach
        </svg>
		<div class="title"> <% $patchwork->title or 'Patchwork '.$patchwork->id %> </div>
		<div class="date">dodano: <span><% $patchwork->created_at->format('d.m.Y') %></span></div>
		<?= $patchwork->content ?>
		<div class="statistics">
			<div class="views"><% $patchwork->views or 0 %></div>
			<div class="likes"><% $patchwork->likes or 0 %></div>
		</div>
		<a>Szczegóły</a>
	</div>
</div>
@endsection()

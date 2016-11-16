@extends('index')

@section('content')
<div id="gallery">
	@foreach( $patchworks as $patchwork )
	<div class="single-patchwork">
		<div class="title"> <% $patchwork->title or 'Patchwork '.$patchwork->id %> </div>
		<div class="date">dodano: <span><% $patchwork->created_at->format('d.m.Y') %></span></div>
		<?= $patchwork->content ?>
		<div class="statistics">
			<div class="views"><% $patchwork->views or 0 %></div>
			<div class="likes"><% $patchwork->likes or 0 %></div>
		</div>
		<a href="<% route('single-patchwork', $patchwork) %>">Szczegóły</a>
	</div>
	@endforeach
</div>
@endsection()

@extends('index')

@section('content')
<div id="gallery">
	<h1>@lang('translations.gallery')</h1>
	<form class="search-form">
		<input name="search" type="text" title="@lang('translations.search')" value="{{ old('search') }}" />
		<select name="order">
			<option value="">@lang('translations.order.no')</option>
			<option value="created_at DESC">@lang('translations.order.created_des')</option>
			<option value="created_at ASC">@lang('translations.order.created_asc')</option>
			<option value="likes DESC">@lang('translations.order.likes_desc')</option>
			<option value="likes ASC">@lang('translations.order.likes_asc')</option>
			<option value="views DESC">@lang('translations.order.views_desc')</option>
			<option value="views ASC">@lang('translations.order.views_asc')</option>
		</select>
		<button type="submit">@lang('translations.search')</button>
	</form>
	@foreach( $patchworks->chunk(ceil($patchworks->count() / 4)) as $chunk )
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
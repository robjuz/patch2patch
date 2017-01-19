@extends('index')

@section('content')
<div id="create">
	<div id="welcome">
		@lang('translations.create_welcome_message')
	</div>
	
	<div id="create-board">
		@include('partials.create-board')
	</div>
	
	<form id="save-patchwork-form" method="POST" action="{{ route('patchwork.store') }}">
		@include('partials.save-patchwork-form')
	</form>

    <div id="side-panel">
        @include('partials.create-side-panel')
    </div>
</div>
@endsection()

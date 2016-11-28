@extends('index')

@section('content')
<div id="create">
    <div id="main-panel">
        <div id="welcome">
            Tutaj będzie Twój patchwork! <br>
            Najpierw wybierz z jakich elementów ma się składać <br>
            <span>→</span>
        </div>
        <div id="create-board">
            @include('partials.create-board')
    	</div>
        <form id="save-patchwork-form" method="POST" action="<% route('patchwork.store') %>">
            @include('partials.save-patchwork-form')
        </form>
	</div>

    <div id="side-panel">
        @include('partials.create-side-panel')
    </div>
</div>
@endsection()

@extends('index')

@section('content')
<div id="edit">
    <div id="main-panel">
        <div id="create-board">
            @include('partials.create-board')
    	</div>
        <form id="save-patchwork-form" method="POST" action="{{ route('patchwork.update', $patchwork) }}">
            {{ method_field('PUT') }}
            @include('partials.save-patchwork-form')
        </form>
    </div>
    <div id="side-panel">
        @include('partials.create-side-panel')
    </div>
</div>
@endsection()

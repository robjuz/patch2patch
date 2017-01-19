@extends('index')

@section('content')
<div id="homepage">
  <h1>@lang('translations.welcome_to') @include('partials.logo')</h1>
  <h2>
    @lang('translations.welcome_message')
  </h2>
</div>
@endsection()

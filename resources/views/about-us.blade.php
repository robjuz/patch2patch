@extends('index')

@section('content')
<div id="about-us">
  <h1>@lang('translations.about_us')</h1>
  @includeIf('about_us.'.App::getLocale())
</div>
@endsection()

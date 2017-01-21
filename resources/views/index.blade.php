<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="patchwprk, szycie, projektowanie, design">
	<meta name="description" content="patch2patch - zaprojektuj nowe poszewki na poduszki, kapę na łóżko, torbę na ramię. Patch2patch to łatwe narzędzie dla wszystkich rozpocznających swoja przygodę z szyciem i projektowaniem. Udanej zabawy!">

	<title>
		patch2patch
	</title>

	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
    <!--<link rel="stylesheet" href="/css/jquery-ui.min.css">-->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/flag-icon.min.css">



	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-76228389-2', 'auto');
	  ga('send', 'pageview');
    </script>

</head>
<body>
<div id="main-wrapper">
	<header>
		<div id="header-content">
			<div id="logo">
				<a href='/'>
					@include('partials.logo')
				</a>
			</div>
			<div class="header-right">
				<ul class="language-switch">
					@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
						<li>
							<a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
								<span class="flag-icon flag-icon-{{ $properties['regional'] }}"></span>
							</a>
						</li>
					@endforeach
				</ul>
				<menu>
					<a class="menuitem active" href="{{ route('patchwork.create')}}">
						@lang('translations.create')
					</a>
					<a class="menuitem" href="{{ route('patchwork.index') }}">
						@lang('translations.gallery')
					</a>
					<a class="menuitem" href="{{ route('comment.index') }}">
						@lang('translations.guest_book')
					</a>
					<a class="menuitem" href="{{ route('about-us')}}">
						@lang('translations.authors')
					</a>
				</menu>
			</div>
		</div>
	</header>

	<main>

		 @yield('content')

	</main>
	<!--
	<footer>
		<span>
			patch2patch 2016
		</span>
	</footer>
	-->
<!--
	<div id="loading-gears-wrapper">
		<div id="loading-gears">
			<svg width="200px" height="200px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
				<rect class="first patch" 	width="100" height="100" />
				<rect class="second patch" 	width="100" height="100" />

			</svg>
		</div>
	</div>
-->
	<div id="loading-gears-wrapper">
		<div id="loading-gears">
			<svg width="170px" height="170px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-gears"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"/><g transform="translate(-20,-20)"><path d="M79.9,52.6C80,51.8,80,50.9,80,50s0-1.8-0.1-2.6l-5.1-0.4c-0.3-2.4-0.9-4.6-1.8-6.7l4.2-2.9c-0.7-1.6-1.6-3.1-2.6-4.5 L70,35c-1.4-1.9-3.1-3.5-4.9-4.9l2.2-4.6c-1.4-1-2.9-1.9-4.5-2.6L59.8,27c-2.1-0.9-4.4-1.5-6.7-1.8l-0.4-5.1C51.8,20,50.9,20,50,20 s-1.8,0-2.6,0.1l-0.4,5.1c-2.4,0.3-4.6,0.9-6.7,1.8l-2.9-4.1c-1.6,0.7-3.1,1.6-4.5,2.6l2.1,4.6c-1.9,1.4-3.5,3.1-5,4.9l-4.5-2.1 c-1,1.4-1.9,2.9-2.6,4.5l4.1,2.9c-0.9,2.1-1.5,4.4-1.8,6.8l-5,0.4C20,48.2,20,49.1,20,50s0,1.8,0.1,2.6l5,0.4 c0.3,2.4,0.9,4.7,1.8,6.8l-4.1,2.9c0.7,1.6,1.6,3.1,2.6,4.5l4.5-2.1c1.4,1.9,3.1,3.5,5,4.9l-2.1,4.6c1.4,1,2.9,1.9,4.5,2.6l2.9-4.1 c2.1,0.9,4.4,1.5,6.7,1.8l0.4,5.1C48.2,80,49.1,80,50,80s1.8,0,2.6-0.1l0.4-5.1c2.3-0.3,4.6-0.9,6.7-1.8l2.9,4.2 c1.6-0.7,3.1-1.6,4.5-2.6L65,69.9c1.9-1.4,3.5-3,4.9-4.9l4.6,2.2c1-1.4,1.9-2.9,2.6-4.5L73,59.8c0.9-2.1,1.5-4.4,1.8-6.7L79.9,52.6 z M50,65c-8.3,0-15-6.7-15-15c0-8.3,6.7-15,15-15s15,6.7,15,15C65,58.3,58.3,65,50,65z" fill="#942a2a"><animateTransform attributeName="transform" type="rotate" from="90 50 50" to="0 50 50" dur="1s" repeatCount="indefinite"/></path></g><g transform="translate(20,20) rotate(15 50 50)"><path d="M79.9,52.6C80,51.8,80,50.9,80,50s0-1.8-0.1-2.6l-5.1-0.4c-0.3-2.4-0.9-4.6-1.8-6.7l4.2-2.9c-0.7-1.6-1.6-3.1-2.6-4.5 L70,35c-1.4-1.9-3.1-3.5-4.9-4.9l2.2-4.6c-1.4-1-2.9-1.9-4.5-2.6L59.8,27c-2.1-0.9-4.4-1.5-6.7-1.8l-0.4-5.1C51.8,20,50.9,20,50,20 s-1.8,0-2.6,0.1l-0.4,5.1c-2.4,0.3-4.6,0.9-6.7,1.8l-2.9-4.1c-1.6,0.7-3.1,1.6-4.5,2.6l2.1,4.6c-1.9,1.4-3.5,3.1-5,4.9l-4.5-2.1 c-1,1.4-1.9,2.9-2.6,4.5l4.1,2.9c-0.9,2.1-1.5,4.4-1.8,6.8l-5,0.4C20,48.2,20,49.1,20,50s0,1.8,0.1,2.6l5,0.4 c0.3,2.4,0.9,4.7,1.8,6.8l-4.1,2.9c0.7,1.6,1.6,3.1,2.6,4.5l4.5-2.1c1.4,1.9,3.1,3.5,5,4.9l-2.1,4.6c1.4,1,2.9,1.9,4.5,2.6l2.9-4.1 c2.1,0.9,4.4,1.5,6.7,1.8l0.4,5.1C48.2,80,49.1,80,50,80s1.8,0,2.6-0.1l0.4-5.1c2.3-0.3,4.6-0.9,6.7-1.8l2.9,4.2 c1.6-0.7,3.1-1.6,4.5-2.6L65,69.9c1.9-1.4,3.5-3,4.9-4.9l4.6,2.2c1-1.4,1.9-2.9,2.6-4.5L73,59.8c0.9-2.1,1.5-4.4,1.8-6.7L79.9,52.6 z M50,65c-8.3,0-15-6.7-15-15c0-8.3,6.7-15,15-15s15,6.7,15,15C65,58.3,58.3,65,50,65z" fill="#e6c041"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="90 50 50" dur="1s" repeatCount="indefinite"/></path></g></svg>
		</div>
	</div>
</div>
	<script src="/js/jquery.js"></script>
	<script src="/js/jquery.svg.min.js"></script>
	<script src="/js/jquery.svgdom.min.js"></script>
	<script src="/js/jquery-ui.min.js"></script>
	<script src="/js/patchwork.js"></script>
</body>
</html>

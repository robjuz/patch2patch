<!DOCTYPE html lang="pl">
<head>
	<meta charset="utf-8">
	<title>
		Patchworkarnia
	</title>

	 <link rel="stylesheet" href="/css/main.css">
</head>
<body>

<header>
	<div id="logo">
		<a>
			<img src="logo.jpg" alt="Patchworkarnia">
		</a>
	</div>
	<div id="menu">
		<div class="menuitem active">
			<a href="<% action('PatchworkController@create') %>">
				Projektowanie
			</a>
		</div>
		<div class="menuitem">
			<a href="<% action('PatchworkController@index') %>">
				Galeria
			</a>
		</div>
		<div class="menuitem">
			<a>
				Księga gości
			</a>
		</div>
		<div class="menuitem">
			<a>
				Twórcy
			</a>
		</div>
	</div>
</header>

<main>

	<div class="sidebar-left">
	</div>

	 @yield('content')

</main>

<footer>
	<span>
		Patchworkarnia 2016
	</span>
	<script src="/js/angular.min.js"
</footer>

</body>
</html>

<!DOCTYPE html lang="pl">
<head>
	<meta charset="utf-8">
	<title>
		Patchworkarnia
	</title>

	 <link rel="stylesheet" href="/css/main.css">
	 <link rel="stylesheet" href="/css/jquery-ui.min.css">
</head>
<body>

<header>
	<div id="logo">
		<a>
			<img src="/img/logo.png" alt="Patchworkarnia">
		</a>
	</div>
	<menu>
		<menuitem class="active">
			<a href="/">
				Projektowanie
			</a>
		</menuitem>
		<menuitem>
			<a href="<% route('gallery') %>">
				Galeria
			</a>
		</menuitem>
		<menuitem>
			<a>
				Księga gości
			</a>
		</menuitem>
		<menuitem>
			<a>
				Twórcy
			</a>
		</menuitem>
	</menu>
</header>

<main>

	 @yield('content')

</main>

<footer>
	<span>
		Patchworkarnia 2016
	</span>
	<script src="/js/jquery.js"></script>
	<script src="/js/jquery.svgdom.min.js"></script>
	<script src="/js/jquery.svg.min.js"></script>
	<script src="/js/jquery-ui.min.js"></script>
	<script src="/js/patchwork.js"></script>
</footer>

</body>
</html>

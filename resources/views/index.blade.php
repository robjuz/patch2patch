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
			<a href="<% url('/') %>">
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
	<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
	<!-- <script src="/js/angular.min.js"></script> -->
	<script src="/js/patchwork.js"></script>
</footer>

</body>
</html>

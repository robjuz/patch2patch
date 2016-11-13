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
	<menu>
		<menuitem class="active">
			<a>
				Projektowanie
			</a>
		</menuitem>
		<menuitem>
			<a>
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

@extends('index')

@section('content')

<div id="gallery">
	<div class="single-patchwork">
		<div class="title">Pierwszy patchwork</div>
		<div class="date">dodano: <span>12.11.2016</span></div>
		<img src="patchwork1.jpg" alt="patchwork1">
		<div class="statistics">
			<div class="views">3</div>
			<div class="likes">2</div>
		</div>	
		<a>Szczegóły</a>		
	</div>
	
	<div class="single-patchwork">
		<div class="title">Kolorowa fantazja</div>
		<div class="date">dodano: <span>12.11.2016</span></div>
		<img src="patchwork2.jpg" alt="patchwork1">
		<div class="statistics">
			<div class="views">3</div>
			<div class="likes">2</div>
		</div>
		<a>Szczegóły</a>		
	</div>
	
	<div class="single-patchwork">
		<div class="title">Impresja zimowa</div>
		<div class="date">dodano: <span>12.11.2016</span></div>
		<img src="patchwork3.jpg" alt="patchwork1">
		<div class="statistics">
			<div class="views">3</div>
			<div class="likes">2</div>
		</div>	
		<a>Szczegóły</a>		
	</div>
	
	<div class="single-patchwork">
		<div class="title">Inspiracja kodem Morse'a</div>
		<div class="date">dodano: <span>12.11.2016</span></div>
		<img src="patchwork4.jpg" alt="patchwork1">
		<div class="statistics">		
			<div class="views">3</div>
			<div class="likes">2</div>
		</div>	
		<a>Szczegóły</a>		
	</div>
	
	<div class="single-patchwork">
		<div class="title">Coś dla początkujących</div>
		<div class="date">dodano: <span>12.11.2016</span></div>
		<img src="patchwork1.jpg" alt="patchwork1">
		<div class="statistics">		
			<div class="views">3</div>
			<div class="likes">2</div>
		</div>
		<a>Szczegóły</a>		
	</div>
</div>

@endsection()

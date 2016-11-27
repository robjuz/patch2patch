@extends('index')

@section('content')
<div id="main-panel">
    <div id="welcome">
        Tutaj będzie Twój patchwork! <br>
        Najpierw wybierz z jakich elementów ma się składać <br>
        <span>→</span>
    </div>
    <div id="create-board">
        <div>
            <div id="add-row-top">
                <button type="button">Dodaj wiersz</button>
            </div>
            <div id="add-column-left">
                <button type="button">Dodaj kolumnę</button>
            </div>
            <div id="patchwork-wrapper">
                <!-- initial patchwork (5x3) -->
                <svg id="patchwork"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns="http://www.w3.org/1999/xlink"
                    version="1.1"
                    viewBox="0 0 500 300">
                    <g transform="translate(0,0)">  <rect /></g>
                    <g transform="translate(100,0)"><rect /></g>
                    <g transform="translate(200,0)"><rect /></g>
                    <g transform="translate(300,0)"><rect /></g>
                    <g transform="translate(400,0)"><rect /></g>
                    <g transform="translate(0,100)"><rect /></g>
                    <g transform="translate(100,100)"><rect /></g>
                    <g transform="translate(200,100)"><rect /></g>
                    <g transform="translate(300,100)"><rect /></g>
                    <g transform="translate(400,100)"><rect /></g>
                    <g transform="translate(0,200)"><rect /></g>
                    <g transform="translate(100,200)"><rect /></g>
                    <g transform="translate(200,200)"><rect /></g>
                    <g transform="translate(300,200)"><rect /></g>
                    <g transform="translate(400,200)"><rect /></g>
                </svg>
            </div>
            <div id="add-column-right">
                <button type="button">Dodaj kolumnę</button>
            </div>
            <div id="add-row-bottom">
                <button type="button">Dodaj wiersz</button>
            </div>
        </div>

		<button id="save-patchwork" class="save">Zapisz</button>
        <form id="save-patchwork-form" method="POST" action="<% route('patchwork.store') %>">
            <input id="patchwork-content" type="hidden" name="content" value=""/>
            <input id="patchwork-fabrics" type="hidden" name="fabrics" />
            <div class="form-group">
                <label for="title">Nazwa</label>
                <input type="text" name="title"/>
            </div>
            <div class="form-group">
                <label for="description">Opis</label>
                <textarea name="description"></textarea>
            </div>
            <button type="submit" class="save"> Zapisz </button>
        </form>
	</div>
</div>
<div id="side-panel">
    <div id="patch-list">
		@include('patches.basics')
        <!-- @include('patches.triangles') -->
        <!-- @include('patches.rectangles') -->
    </div>
    <div id="fabric-list">
		<h2>Materiały:</h2>
        @foreach( $fabrics as $fabric)
            <div class="fabric">
                <svg height="0">
                    <defs>
                      <pattern id="fabric-<% $fabric->id %>" data-id="<% $fabric->id %>" x="0" y="0" width="1" height="1">
                        <image width="100" height="100"
                               xlink:href="<% $fabric->image %>"/>
                      </pattern>
                  </defs>
                </svg>
    			<div class="fabric-thumbnail"style="
                    background-color: <% $fabric->color %>;
                    <?= is_file(public_path().$fabric->image) ? 'background-image: url(' . $fabric->image . '); background-size: contain;' : '' ?>"></div>
    			<span class="fabric-color"><% $fabric->title %></span>
    		</div>
        @endforeach
		<hr>
		<div class="fabric new">
            <div id="add-fabric">
    			<div>?</div>
    			<span>Dodaj nowy materiał!</span>
            </div>
            <form enctype="multipart/form-data" id="save-fabric-form" action="/api/fabric" type="POST">
                <div class="form-group">
                    <label for="title">Nazwa</label>
                    <input type="text" name="title"/>
                </div>
                <div class="form-group">

                    <input type="file" name="image" class="inputfile inputfile-6"/>
                    <label for="image"><span></span><strong>
                    <svg viewBox="0 0 20 17" height="17" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z">
                    </svg>
                    Choose a file…
                    </strong></label>
                    <!--<button type="button">Wybierz plik</button>-->
                </div>
                <div class="form-group">
                    <label for="title">Kolor</label>
                    <input type="color" name="color"/>
                </div>
                <button type="submit" class="save"> Dodaj </button>
            </form>
		</div>
    </div>
</div>
@endsection()

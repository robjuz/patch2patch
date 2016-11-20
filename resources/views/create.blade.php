@extends('index')

@section('content')
<div id="side-panel">
    <div id="patch-list">
        @include('patches.trianges')
        @include('patches.rectangles')
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
                    <label for="image">Obrazek</label>
                    <input type="file" name="image"/>
                </div>
                <div class="form-group">
                    <label for="title">Kolor</label>
                    <input type="color" name="color"/>
                </div>
                <button type="submit"> Dodaj </button>
            </form>
		</div>
    </div>
</div>

<div id="main-panel">
    <div id="create-board">
		<div id="welcome">
			Tutaj będzie Twój patchwork! <br>
			Najpierw wybierz z jakich elementów ma się składać <br>
			<span>→</span>
		</div>
        <div id="patchwork-wrapper">
            <svg id="patchwork"
                xmlns="http://www.w3.org/2000/svg"
                xmlns="http://www.w3.org/1999/xlink"
                version="1.1">
            </svg>
        </div>

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
            <button type="submit"> Zapisz </button>
        <form>
	<div>
</div>
@endsection()

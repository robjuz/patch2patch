<div id="tabs" class="tabs">
    <ul>
        <li><a href="#patch-list">@lang('translations.patches')</a></li>
        <li><a href="#fabric-list">@lang('translations.materials')</a></li>
    </ul>
    <div id="patch-list" class="tabs tabs-vertical">
        <ul>
            <li><a href="#patch-list-basic">@lang('translations.basic')</a></li>
            <!--<li><a href="#patch-list-rectangles">Kwadraty</a></li>-->
            <li><a href="#patch-list-triangles">@lang('translations.complex')</a></li>
        </ul>
        <div id="patch-list-basic">
            @include('patches.basics')
        </div>
        <!--<div id="patch-list-rectangles">
            @include('patches.rectangles')
        </div>-->
        <div id="patch-list-triangles">
            @include('patches.triangles')
        </div>
    </div>
    <div id="fabric-list">
        @foreach( $fabrics as $fabric)
            <div class="fabric">
                <svg height="0">
                    <defs>
                      <pattern id="fabric-{{ $fabric->id }}" data-id="{{ $fabric->id }}" x="0" y="0" width="1" height="1">
                        <image width="100" height="100"
                               xlink:href="{{ $fabric->image or '' }}"/>
                      </pattern>
                  </defs>
                </svg>
                <div class="fabric-thumbnail"style="
                    background-color: {{ $fabric->color }};
                    <?= is_file(public_path().$fabric->image) ? 'background-image: url(' . $fabric->image . '); background-size: contain;' : '' ?>"></div>
                <span class="fabric-color">{{ $fabric->title or ''}}</span>
            </div>
        @endforeach
        <hr>
        <div class="fabric new">
            <div id="add-fabric">
                <div class="fabric-thumbnail">?</div>
                <span class="fabric-color">@lang('translations.add_material')</span>
            </div>
            <form enctype="multipart/form-data" id="save-fabric-form" action="/api/fabric" type="POST">
                <div class="form-group">
                    <label for="title">@lang('translations.title')</label>
                    <input type="text" name="title"/>
                </div>
                <!--<div class="form-group">
                    <input type="file" name="image" />
                </div>-->
                <div class="form-group">
                    <label for="color">@lang('translations.color')</label>
                    <input type="color" name="color"/>
                </div>
                <button type="submit"> @lang('translations.add) </button>
            </form>
        </div>
    </div>
</div>

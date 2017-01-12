<svg id="initial-patchwork"
     xmlns="http://www.w3.org/2000/svg"
     xmlns="http://www.w3.org/1999/xlink"
     version="1.1"
     >
</svg>
<div id="create-board-content">
    <div id="add-row-top" class="extend-patchwork">
        <button id="add-row-top" type="button" class="btn">Dodaj wiersz</button>
    </div>
    <div id="add-column-left" class="extend-patchwork">
        <button type="button" class="btn">Dodaj kolumnę</button>
    </div>
    <div id="patchwork-wrapper">
        <?php
        if (isset($patchwork)) { ?>
        <?php
            echo $patchwork->content;
        } else { ?>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns="http://www.w3.org/1999/xlink"
                version="1.1"
                viewBox="0 0 200 200"
                >
                <g x="0" y="0" transform="translate(0,0)">  <rect width="100" height="100"/></g>
                <g x="1" y="0" transform="translate(100,0)"><rect width="100" height="100"/></g>
                <g x="0" y="1" transform="translate(0,100)"><rect width="100" height="100"/></g>
                <g x="1" y="1" transform="translate(100,100)"><rect width="100" height="100"/></g>
            </svg>
            <?php
        }
        ?>
    </div>
    <div id="add-column-right" class="extend-patchwork">
        <button type="button" class="btn">Dodaj kolumnę</button>
    </div>
    <div id="add-row-bottom" class="extend-patchwork">
        <button type="button" class="btn">Dodaj wiersz</button>
    </div>
</div>

<button id="preview-button">Podgląd</button>
<button id="save-patchwork">Zapisz</button>

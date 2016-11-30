<div>
    <div id="add-row-top">
        <button type="button">Dodaj wiersz</button>
    </div>
    <div id="add-column-left">
        <button type="button">Dodaj kolumnę</button>
    </div>
    <div id="patchwork-wrapper">
        <?php
        if (isset($patchwork)) {
            echo $patchwork->content;
        } else { ?>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns="http://www.w3.org/1999/xlink"
                version="1.1"
                viewBox="0 0 200 200">
                <g transform="translate(0,0)">  <rect width="100" height="100"/></g>
                <g transform="translate(100,0)"><rect width="100" height="100"/></g>
                <g transform="translate(0,100)"><rect width="100" height="100"/></g>
                <g transform="translate(100,100)"><rect width="100" height="100"/></g>
            </svg>
            <?php
        }
        ?>
    </div>
    <div id="add-column-right">
        <button type="button">Dodaj kolumnę</button>
    </div>
    <div id="add-row-bottom">
        <button type="button">Dodaj wiersz</button>
    </div>
</div>

<button id="preview-button" type="button" class="btn pull-left">Podgląd</button>
<button id="save-patchwork" class="btn pull-right">Zapisz</button>

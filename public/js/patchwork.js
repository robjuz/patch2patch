$('.tabs').tabs();

/**
 * Positioning patches
 **/
var PATCH_SIZE = 100;

var patchworkSvg;
var currentPatch;
var patchwork;
var patchworkWrapper = $('#create-board #patchwork-wrapper');
var viewBox;

$(document).ready(function () {
    $('#create-board #initial-patchwork').svg({
        onLoad: function (svg) {
            var basicSvg = patchworkWrapper.find('svg');
            svg.add(basicSvg.children());
            svg.configure({viewBox: basicSvg[0].getAttribute('viewBox')}, true);
            basicSvg.remove();
            patchworkWrapper.append(svg.root());
            patchworkSvg = svg;
            patchwork = $(svg.root());
            viewBox = patchwork[0].viewBox.baseVal;

            patchwork.on('click', '>g', function (e) {
                e.stopPropagation();
                if (currentPatch !== undefined) {
                    var patch = currentPatch.clone();
                    patch.find('polygon').removeAttr('class').attr('fill', '#FFF');

                    if (patch.hasClass('comboPatch')) {
                        var initX = parseInt($(this).attr('x'), 10);
                        var initY = parseInt($(this).attr('y'), 10);
                        patch.find('g').each(function () {
                            var x = parseInt($(this).attr('x'), 10) + initX;
                            var y = parseInt($(this).attr('y'), 10) + initY;
                            patchwork.find('g[x=' + x + '][y=' + y + ']').html($(this).find('polygon'));
                        });
                    } else {
                        $(this).html(patch.children());
                    }
                }
            });

            patchwork.on('click', 'polygon', function () {
                if (activeFabric !== undefined) {
                    $(this).attr('fill', activeFabric.color);
                    $(this).attr('fabric-id', activeFabric.id);
                }
            });
        }
    });
});


$('#patch-list svg').click(function (e) {
    e.stopPropagation();
    $('#welcome').hide();
    $('#create-board, #save-patchwork').show();
    patchwork.show();

    activeFabric = undefined;
    $(".current").removeClass("current"); //current fabric

    $('#patch-list svg.current').removeClass('current');
    $(this).addClass("current");
    currentPatch = $(this).find('.main-group');
});

$('#add-column-right').click(function () {

    for (var i = viewBox.y; i < (viewBox.height + viewBox.y); i += PATCH_SIZE) {
        var g = patchworkSvg.group({
            transform: 'translate(' + (viewBox.width + viewBox.x) + ',' + i + ')',
            x: viewBox.width / PATCH_SIZE,
            y: i / PATCH_SIZE
        });
        patchworkSvg.rect(g, 0, 0, PATCH_SIZE, PATCH_SIZE);
    }

    viewBox.width += PATCH_SIZE;
    patchwork.width(patchwork.width() + PATCH_SIZE);
    patchworkWrapper.scrollLeft(patchwork.width());

});
$('#add-column-left').click(function () {

    viewBox.x -= PATCH_SIZE;
    viewBox.width += PATCH_SIZE;

    for (var i = viewBox.y; i < (viewBox.height + viewBox.y); i += PATCH_SIZE) {
        var g = patchworkSvg.group({
            transform: 'translate(' + viewBox.x + ',' + i + ')',
            x: viewBox.x / PATCH_SIZE,
            y: i / PATCH_SIZE
        });
        patchworkSvg.rect(g, 0, 0, PATCH_SIZE, PATCH_SIZE);
    }
    patchwork.width(patchwork.width() + PATCH_SIZE);
    patchworkWrapper.scrollLeft(0);

});
$('#add-row-bottom').click(function () {

    for (var i = viewBox.x; i < viewBox.width + viewBox.x; i += PATCH_SIZE) {
        var g = patchworkSvg.group({
            transform: 'translate(' + i + ',' + (viewBox.height + viewBox.y) + ')',
            x: i / PATCH_SIZE,
            y: viewBox.height / PATCH_SIZE
        });
        patchworkSvg.rect(g, 0, 0, PATCH_SIZE, PATCH_SIZE);
    }
    viewBox.height += PATCH_SIZE;
    patchwork.height(patchwork.height() + PATCH_SIZE);
    patchworkWrapper.scrollTop(patchwork.height());

});
$('#add-row-top').click(function () {

    viewBox.y -= 100;
    viewBox.height += 100;

    for (var i = viewBox.x; i < viewBox.width + viewBox.x; i += PATCH_SIZE) {
        var g = patchworkSvg.group({
            transform: 'translate(' + i + ',' + viewBox.y + ')',
            x: i / PATCH_SIZE,
            y: viewBox.y / PATCH_SIZE
        });
        patchworkSvg.rect(g, 0, 0, PATCH_SIZE, PATCH_SIZE);
    }

    patchwork.height(patchwork.height() + PATCH_SIZE);
    patchworkWrapper.scrollTop(0);

});

/**
 * Positioning fabrics
 */
var activeFabric;
$(document).on('click', '#fabric-list .fabric:not(.new)', function (e) {
    currentPatch = undefined;
    $(".current").removeClass("current");
    $(this).addClass("current");
    var pattern = $(this).find('pattern');
    var fabricThumbnail = pattern.closest('.fabric').find('.fabric-thumbnail');
    if (fabricThumbnail.css('background-image') !== "none") {
        activeFabric = {
            color: 'url("#' + pattern.attr('id') + '")',
            id: pattern.data('id')
        };
    } else {
        activeFabric = {
            color: fabricThumbnail.css('background-color'),
            id: pattern.data('id')
        };
    }
});

$('#add-fabric').click(function () {
    var inputs = document.querySelectorAll('.inputfile');
    Array.prototype.forEach.call(inputs, function (input) {
        var label = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener('change', function (e) {
            var fileName = '';
            if (this.files && this.files.length > 1)
                fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace('{count}', this.files.length);
            else
                fileName = e.target.value.split('\\').pop();

            if (fileName)
                label.querySelector('span').innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });
    });


    var dialog = $('#save-fabric-form').closest('.ui-dialog');

    if (dialog.length > 0)
        $('#save-fabric-form').dialog('open');
    else
        $('#save-fabric-form').dialog({title: "Dodaj nowy materiał"});

});

$('#save-patchwork').click(function () {
    $('#save-patchwork-form').dialog({
        title: "Zapisz patchwork"
    });
});


$('#save-fabric-form').submit(function (e) {
    e.preventDefault();
    showSpinner();
    $.ajax({
        url: $(this).attr('action'),
        type: 'post',
        processData: false,
        contentType: false,
        data: new FormData(this),
        success: function (result) {
            $(result).insertBefore('#fabric-list hr');
            $('#save-fabric-form').dialog('close');
            $('#add-fabric').show();
        }
    });
    hideSpinner();
});


$('#save-patchwork-form').submit(function (e) {
    showSpinner();
    var svg = $('#create-board #patchwork-wrapper svg ');
    svg.removeAttr('id').removeAttr('style');
    var serializer = new XMLSerializer();
    var str = serializer.serializeToString(svg[0]);
    $('#patchwork-content').val(str);

    var fabricsId = [];
    svg.find('polygon').each(function () {
        var val = $(this).attr('fabric-id');
        if (val !== undefined && (fabricsId.indexOf(val) == -1)) {
            fabricsId.push(val)
        }
    });

    $('#patchwork-fabrics').val(fabricsId);
});

$('#preview-button').click(function () {
    $('#patchwork-wrapper').dialog(
        {
            'width': 0.8 * $(window).width(),
            'height': 0.8 * $(window).height(),
            'top':'15px',
            dialogClass: "preview",
            title: 'Podgląd',
            close: function (event, ui) {
                $('#patchwork-wrapper').dialog('destroy');
                $('#create-board').show();
            }
        });
});

function showSpinner() {
    $("#loading-gears-wrapper").show();
}

function hideSpinner() {
    $("#loading-gears-wrapper").hide();
}

$(window).scroll(function () {
    if($(document).scrollTop() > 50) {
        $('header').addClass('compact');
    } else {
        $('header').removeClass('compact');
    }
});

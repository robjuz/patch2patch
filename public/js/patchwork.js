$('#tabs').tabs();

/**
* Positioning patches
**/
var currentPatch;

// $(document).click(function() {
//     $('#patch-list svg.current').removeClass('current');
//     currentPatch = undefined;
// });
$('#patch-list svg').click(function(e) {
    activeFabric = undefined;
    $('#create-board, #save-patchwork').show();
    $(".current").removeClass("current");
     e.stopPropagation();
    $('#welcome').hide();
    $('#patchwork').show();

    currentPatch = $('#patch-list svg.current');
    currentPatch.removeClass('current');
    $(this).addClass("current");
    currentPatch = $(this).find('.main-group');
});
$('#patchwork').on('click', 'g', function(e){
    e.stopPropagation();
    if (currentPatch !== undefined) {
        var patch = currentPatch.clone().removeClass('current');
        patch.find('polygon').removeAttr('class').attr('fill', '#FFF');
        $(this).html(patch);
    }
});

$('#add-column-right').click(function(){
    var patchwork = document.querySelector('#patchwork');
    viewBox = patchwork.viewBox.baseVal;

    var svg = $('#patchwork').svg().svg('get');
    for (var i=viewBox.y; i< (viewBox.height+viewBox.y); i+=100) {
        var g = svg.group({transform: 'translate('+(viewBox.width + viewBox.x)+','+i+')'});
        svg.rect(g, 0, 0, 100, 100);
    }

    viewBox.width += 100;
    patchwork.style.width = $('#patchwork').width() + 100;
    $('#patchwork-wrapper').scrollLeft($('#patchwork').width());

});
$('#add-column-left').click(function(){
    var patchwork = document.querySelector('#patchwork');
    viewBox = patchwork.viewBox.baseVal;
    viewBox.x -= 100;
    viewBox.width += 100;

    var svg = $('#patchwork').svg().svg('get');
    for (var i=viewBox.y; i< (viewBox.height+viewBox.y); i+=100) {
        var g = svg.group({transform: 'translate('+viewBox.x+','+i+')'});
        svg.rect(g, 0, 0, 100, 100);
    }
    patchwork.style.width = $('#patchwork').width() + 100;
    $('#patchwork-wrapper').scrollLeft(0);

});
$('#add-row-bottom').click(function(){
    var patchwork = document.querySelector('#patchwork');
    viewBox = patchwork.viewBox.baseVal;

    var svg = $('#patchwork').svg().svg('get');
    for (var i=viewBox.x; i< (viewBox.width+viewBox.x); i+=100) {
        var g = svg.group({transform: 'translate('+i+','+(viewBox.height + viewBox.y)+')'});
        svg.rect(g, 0, 0, 100, 100);
    }
    viewBox.height += 100;
    patchwork.style.height = $('#patchwork').height() + 100;
    $('#patchwork-wrapper').scrollTop($('#patchwork').height());

});
$('#add-row-top').click(function(){
    var patchwork = document.querySelector('#patchwork');
    viewBox = patchwork.viewBox.baseVal;
    viewBox.y -= 100;
    viewBox.height += 100;

    var svg = $('#patchwork').svg().svg('get');
    for (var i=viewBox.x; i< (viewBox.width+viewBox.x); i+=100) {
        var g = svg.group({transform: 'translate('+i+','+viewBox.y+')'});
        svg.rect(g, 0, 0, 100, 100);
    }

    patchwork.style.height = $('#patchwork').height() + 100;
    $('#patchwork-wrapper').scrollTop(0);

});

/**
* Positioning fabrics
*/
var activeFabric;
$(document).on('click', '#fabric-list .fabric:not(.new)', function(e){
    currentPatch = undefined;
	$(".current").removeClass("current");
	$(this).addClass("current");
    var pattern = $(this).find('pattern');
    var fabricThumbnail = pattern.closest('.fabric').find('.fabric-thumbnail');
    if (fabricThumbnail.css('background-image') !== "none"){
        activeFabric = {
            color : 'url("#'+ pattern.attr('id')+'")',
            id : pattern.data('id')
        };

    } else {
        activeFabric = {
            color : fabricThumbnail.css('background-color'),
            id : pattern.data('id')
        };
    }
});

$('#patchwork').on('click', 'polygon', function(){
    if (activeFabric !== undefined){
        $(this).attr('fill', activeFabric.color);
        $(this).attr('fabric-id', activeFabric.id);
    }
});

$('#add-fabric').click(function() {
	var inputs = document.querySelectorAll('.inputfile');
	Array.prototype.forEach.call(inputs, function(input){
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener('change', function(e){
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split('\\').pop();

			if( fileName )
				label.querySelector('span').innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});
	});


	var dialog = $('#save-fabric-form').closest('.ui-dialog');

	if( dialog.length > 0 )
	   $('#save-fabric-form').dialog('open');
	else
		$('#save-fabric-form').dialog({title: "Dodaj nowy materiał"});

});

$('#save-patchwork').click(function() {
    $('#save-patchwork-form').dialog({
		title: "Zapisz patchwork"
	});
});


$('#save-fabric-form').submit(function(e){
    e.preventDefault();
    showSpinner();
    $.ajax({
          url: $(this).attr('action'),
          type: 'post',
          processData: false,
          contentType: false,
          data: new FormData(this),
          success: function(result) {
              $(result).insertBefore('#fabric-list hr');
              $('#save-fabric-form').dialog('close');
              $('#add-fabric').show();
          }
      });
      hideSpinner();
});


$('#save-patchwork-form').submit(function(e)
{
	showSpinner();
    var svg = $('#create-board svg');
    svg.removeAttr('id').removeAttr('style');
    var serializer = new XMLSerializer();
    var str = serializer.serializeToString(svg[0]);
    $('#patchwork-content').val(str);

    var fabricsId = new Array();
    $(svg).find('polygon').each(function(){
        var val = $(this).attr('fabric-id');
        if (val !== undefined && !$.inArray(val, fabricsId)) {
            fabricsId.push(val)
        }
    });

    $('#patchwork-fabrics').val(fabricsId);
    e.preventDefault();
});

$('#preview').click(function(){
    $('#create-board').hide();
    $('#patchwork-wrapper').dialog(
    {
        'width': 0.8 * $(window).width(),
        'height': 0.8 * $(window).height(),
        // 'left': '0px',
        // 'top':'0px',
        dialogClass: "preview",
        title: 'Podgląd',
        // resizable: false,
        close: function(event, ui)
        {
            $('#patchwork-wrapper').dialog('destroy');
            $('#create-board').show();
        }
    });
});

$(window).on('resize', function() {
    
});

function showSpinner(){
	$("#loading-gears-wrapper").show();
}

function hideSpinner(){
	$("#loading-gears-wrapper").hide();
}

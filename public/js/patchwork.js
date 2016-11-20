
var activeFabric = null;

$('#patch-list svg').click(function(){
    var x = 4;
    var y = 4;
    $(this).addClass("current");

    x = +prompt('Ile elementów ma być w poziomie?');
    y = +prompt('Ile elementów ma być w pionie?');
    var patch = $(this).find('g.main-group');
    var patchwork = $('#patchwork');
    patchwork.attr('viewBox', '0 0 '+ (x*220) + ' ' + (y*220));


    for (var i = 0; i < x; i++) {
        for (var j = 0; j < y; j++) {
            var patchToAdd = patch.clone();
            patchToAdd.find("polygon").removeAttr("class");
            patchToAdd.attr('transform','translate('+ (200*i) + ','+ (200*j) +')');
            patchToAdd.find('polygon').attr('fill', 'white');
            patchwork.append(patchToAdd);
        }
    }

    $('#patch-list').hide();
    $('#welcome').hide();
    $('#fabric-list').show();
    $('#save-patchwork').show();
});

$(document).on('click', '#fabric-list .fabric:not(.new)', function(){
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

$('#create-board').on('click', 'polygon', function(){
    var patchworkFabrics = $('#patchwork-fabrics').val();
    patchworkFabrics = JSON.parse("[" + patchworkFabrics + "]");

    if (!(activeFabric.id in patchworkFabrics)){
        patchworkFabrics.push(activeFabric.id);
        $('#patchwork-fabrics').val(patchworkFabrics);
    }
	$(this).attr('fill', activeFabric.color);
});

$('#add-fabric').click(function() {
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
});


$('#save-patchwork-form').submit(function(e)
{
    var svg = document.getElementById('patchwork');
    var serializer = new XMLSerializer();
    var str = serializer.serializeToString(svg);
    $('#patchwork-content').val(str);
});

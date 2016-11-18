// function(){
//     var app = angular.module('patchwork', []);
// }


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
});

$(document).on('click', '#fabric-list .fabric:not(.new)', function(){
	$(".current").removeClass("current");
	$(this).addClass("current");
    var pattern = $(this).find('pattern');
    var fabricThumbnail = pattern.closest('.fabric').find('.fabric-thumbnail');
    if (fabricThumbnail.css('background-image') !== "none"){
        activeFabric = 'url("#'+ pattern.attr('id')+'")';

    } else {
        activeFabric = fabricThumbnail.css('background-color');
    }
});

$('#create-board').on('click', 'polygon', function(){
	$(this).attr('fill', activeFabric);
});

$('#add-fabric').click(function() {
    $('#save-fabric-form').show();
    $('#add-fabric').hide();
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
              $('#save-fabric-form').hide();
              $('#add-fabric').show();
          }
      });
});


$('#save-patchwork-form').submit(function(e)
{
    e.preventDefault();
    var svg = document.getElementById('patchwork');
    var serializer = new XMLSerializer();
    var str = serializer.serializeToString(svg);
    $('#patchwork-content').val(str);

    $.post(
        $(this).attr('action'),
        $(this).serialize(),
        function(result) {
            alert(result);
        }
    )
});

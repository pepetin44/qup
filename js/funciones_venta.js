  /* when document is ready */
  $(function(){

    /* initiate the plugin */
    $("div.holder").jPages({
      containerID  : "itemContainer",
      perPage      : 28,
      startPage    : 1,
      startRange   : 1,
      midRange     : 5,
      endRange     : 1
    });

  });


function clear_textbox(id,holder)
{
if (document.getElementById(id).value == holder)
document.getElementById(id).value = "";
}

function animar_scroll(ubicacion){
	var posicion = $("#"+ubicacion).position().top;
            $('#publicar_anuncio').animate({scrollTop: posicion}, 500);
            return;
	}
	
$(function() {
    $('#slideshow_publicar_anuncio_previo').before('<ul id="nav_anuncio_previo">').cycle({
    fx:      'scrollRight', 
    next:   '#right_previo', 
    timeout:  0, 
    easing:  'easeInOutBack',
        pager:  '#nav_anuncio_previo',
        pagerAnchorBuilder: function(idx, slide) {
            return '<li><a href="#"><img src="' + slide.src + '" width="61" height="44" /></a></li>';
        }
    });
})
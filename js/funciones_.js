$(document).ready(function() {
    $('.slideshow').cycle({
	fx:     'scrollDown', 
    easing: 'easeOutBounce', 
    delay:  -2000 
	});
	 $('.slideshow_dos').cycle({
  
	});
	$('.slideshow_tres').cycle({ 
    fx:    'scrollRight', 
    delay: -1000 
 });
	 
	  $(".iconos_flotantes2").hide("fast");
});
function mostrar_icono(id){
	   
	  $("#"+id).show(900);
	}
function ocultar_icono(id){
	
	  $("#"+id).hide("fast");
	
	}
	
 function oculta(id){
         var elDiv = document.getElementById(id); //se define la variable "elDiv" igual a nuestro div
         elDiv.style.display='none'; //damos un atributo display:none que oculta el div     
		
       }
  
   function muestra(id){
        var elDiv = document.getElementById(id); //se define la variable "elDiv" igual a nuestro div
        elDiv.style.display='block';//damos un atributo display:block que  el div     
       }

$(function () {

  var $win = $(window);

  // definir mediente $pos la altura en píxeles desde el borde superior de la ventana del navegador y el elemento

  var $pos = 100;

  $win.scroll(function () {

     if ($win.scrollTop() <= $pos ){

      $("#mini_menu").css("display","none");
	   $("#menu_oculto").css("display","none");
	   $("#iconos_ocultos").css("display","none");
	   $("#bajar_menu").css("display","block");
	   $('.iconos_flotantes_dos').addClass("iconos_flotantes");
	   document.getElementById('efecto').value='corre';
	   $("#iconos_grandes").css("display","block");
	  // document.getElementById('iconos_ocultos').className="iconos_flotantes";
       //$('.menu').removeClass('fijar');
	 }
     else {
      //$('.menu').addClass('fijar');
      
        $("#mini_menu").css("display","block");
	    $("#iconos_ocultos").css("display","block");
		$("#iconos_grandes").css("display","none");
	  

     }
	 $menu=120;
	 $menu2=200;
	
	 if ($win.scrollTop() >= $menu  && $win.scrollTop() <= $menu2 && document.getElementById('efecto').value=='corre' ){
		 
		 $("#contenedor_menu_principal").effect("transfer", { to: $("#bajar_menu")}, 1000);
		
	document.getElementById('efecto').value='detente';
	
		 }

   });

});
function ver_resultado_iconos(id){

	document.getElementById(id).className="iconos_flotantes_dos";
  
  }
  
 function cambiarTipoFuente(id)
{
  var selecto=document.getElementById(id);
  selecto.className='estilo_select_dos';
}

$(function() {
    $('#slideshow_publicar_anuncio').before('<ul id="nav_anuncio">').cycle({
    fx:      'scrollRight', 
    next:   '#right', 
    timeout:  0, 
    easing:  'easeInOutBack',
        pager:  '#nav_anuncio',
        pagerAnchorBuilder: function(idx, slide) {
            return '<li><a href="#"><img src="' + slide.src + '" width="61" height="44" /></a></li>';
        }
    });
});

function obtener_usuario(usuario){
	document.getElementById('elegir_usuario').value=usuario;	
	}
function mostrar_formulario(){
	
	div=document.getElementById('elegir_usuario').value;
    muestra(div);
	}
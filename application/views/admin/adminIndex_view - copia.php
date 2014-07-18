<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrador-Quierounperro.com</title>
<link rel="shortcut icon" href="<?php echo base_url()?>images/ico.ico" />  
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/reset.css" media="screen"></link>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/administrador.css" media="screen"></link>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/general.css" media="screen"></link>
<script src="<?php echo base_url()?>js/funciones_.js" type="text/javascript"></script>
</head>

<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.8.2.min.js"></script>
<script>
jQuery(document).ready(function(){

	 $(".seccion").click(function() {
             var seccionNombre = $(this).attr('id');
             var seccion = $(this).attr('name');
             var uno = $("#numeroSeccionR").val(seccion);
             var dos = $("#nombreSeccionR").val(seccionNombre);
             $("#seccion").detach();
             $('<label id="seccion">'+seccionNombre+'</label>').appendTo('#nombreSeccion');
			 
			 if(seccion == 1){
				 $(".superior").fadeIn();
				 $(".medio").fadeIn();
				 $(".medioContenido").fadeOut();
				 $(".inferior").fadeIn();
			 } else if(seccion == 8 || seccion == 9 || seccion == 10) {
				 $(".superior").fadeIn();
				 $(".medio").fadeOut();
				 $(".medioContenido").fadeIn();
				 $(".imagenApoyo").fadeIn();
				 $(".inferior").fadeIn();
			 } else {			 
				 $(".superior").fadeIn();
				 $(".medio").fadeOut();
				 $(".medioContenido").fadeIn();
				 $(".inferior").fadeIn();
			 }
             

             console.log(seccionNombre,seccion, uno, dos);
     });
	 
	 $(".addContent").click(function() {
		 	
             var posicion = $(this).attr('data-rel');
			 $("#posicion").val(posicion);
             var uno = $("#posicion").val(posicion);
             
			 muestra('contenedor_modificaciones');
             console.log(uno);
     });

     $("#genero").change(
                function(){
                    var thisValue = $(this).val();
                    var nombreZona = $('#genero option:selected').html();
                    console.log(thisValue, nombreZona);
                    $("#nombreZona").detach();
             		$('<label id="nombreZona">'+nombreZona+'</label>').appendTo('#zonaNombre');
                    $("#zonaIDR").val(thisValue);
    }); 
	
	 $("#saveBanner").click(function() {
             var zona = $("#zonaIDR").val();
             var uno = $("#numeroSeccionR").val();
             var dos = $("#nombreSeccionR").val();
                         

             console.log(uno, dos, zona);
			 
			/* $.ajax({
                url:'<?=base_url()?>admin/principal/uploadBanner',
                type:'POST',
                dataType: 'json',
                data: $("#addBanner").serialize(),
                success: function(data){
                  
                }
    		});*/
     });  
	 
	$(".filtrso").click(
	function(){
		goToSearch();		        
	}
	);


	 
});

function goToSearch(){
	
	$.ajax({
		url     : '<?=base_url()?>admin/principal/tablasDinamicas',
		type    : 'POST',
		data    : 'seccionID='+1+'zonaID='+1,
		success : function(data){
			$('#tablasDinamicasA').html(data);
		}                                       
	})
}
</script>

<body>

<!-- ---------------------------------------------------- contenedor_modificaciones --------------- -->
<form id="addBanner" method="post" action="<?=base_url()?>admin/principal/uploadBanner" enctype="multipart/form-data">
<div class="contenedor_modificaciones" id="contenedor_modificaciones" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_modificaciones');"/> </div>
<input type="hidden" name="numeroSeccionR" id="numeroSeccionR" value="" />
<input type="hidden" name="nombreSeccionR" id="nombreSeccionR" value=""/>
<input type="hidden" name="zonaIDR" id="zonaIDR" value=""/>
<input type="hidden" name="posicion" id="posicion" value=""/>

<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
AGREGAR IMAGEN
</div>

<div class="contenido_intruciones">
<p>Ingrese las imagenes para BP00001:</p>
</br>
<input type="file" name="banner" id="banner" />



</div>
<ul class="morado_reg">
<li>
<input type="submit" />
</li>
</ul>

</div>

</div> <!-- Fin contenedor negro imagenes -->
</form>
<!-- ---------------------------------------------------- contenedor_modificaciones --------------- -->


<!-- ---------------------------------------------------- contenedor_modificaciones_texto --------------- -->


<div class="contenedor_modificaciones" id="contenedor_modificaciones_texto" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_modificaciones_texto');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
AGREGAR TEXTO
</div>
<div class="contenido_intruciones">
<p> Introduzca el texto para BC0001-0000001 </p>
</brSS>
<textarea cols="65" rows="7"></textarea>

</div>
<ul class="morado_reg">
<li>
Guardar
</li>
</ul>



</div>

</div> <!-- Fin contenedor negro imagenes -->
<!-- ---------------------------------------------------- contenedor_modificaciones_texto --------------- -->



<!-- ---------------------------------------------------- encabezado --------------- -->
<div class="encabezado">
<img  src="<?php echo base_url()?>images/logo_admin.png" width="258" height="88"  />

<div class="menu_admin">
<ul class="el_menu">
<li>
Pantallas
<ul>
<li>
<a href="#" id="INICIO" name="1" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Inicio</a>
</li>
<li>
<a href="#" id="VENTA" name="2" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Venta</a>
</li>
<li>
<a href="#" id="CRUZA" name="3" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Cruza</a>
</li>
<li>
<a href="#" id="DIRECTORIO" name="4" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Directorio</a>
</li>
<li>
<a href="#" id="PERFIL DE USUARIO" name="5" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Prefil de usuario</a>
</li>
<li>
<a href="#" id="ADOPCIÓN" name="6" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Adopción</a>
</li>
<li>
<a href="#" id="PERROS PERDIDOS" name="7" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Perros Perdidos</a>
</li>
<li>
<a href="#" id="RAZA DEL MES" name="8" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> La raza del mes</a>
</li>
<li>
<a href="#" id="EVENTO DEL MES" name="9" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Evento del mes</a>
</li>
<li>
<a href="#" id="DATOS CURIOSOS" name="10" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Datos curiosos</a>
</li>
<li>
<a href="#" id="ASOCIACIONES P." name="11" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Asociaciones Protectoras</a>
</li>
<li>
<a href="#" id="¿QUIÉNES SOMOS?" name="12" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> ¿Quiénes somos?</a>
</li>
<li>
<a href="#" id="TUTORIAL" name="13" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Tutorial</a>
</li>
<li>
<a href="#" id="PUBLICIDAD" name="14" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Publicidad</a>
</li>
<li>
<a href="#" id="PREGUNTAS F." name="15" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Preguntas frecuentes</a>
</li>
</ul>
</li>
<li>
Usuarios
<ul>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Altas</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Bajas</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Consultas</a>
</li>
</ul>
</li>
<li>
Mensajes
<ul>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Redactar mensaje</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Enviar mensajes</a>
</li>
</ul>
</li>
<li>
Anuncios
</li>
</ul>
</div>

</div> <!-- fin wncabezado -->
<!-- ---------------------------------------------------- encabezado --------------- -->



<div class="contenedor_central">
<div class="titulo_seccion">
PANTALLAS- <label id="nombreSeccion"><label id="seccion">Seleccione</label></label> 
</div>
<div class="contenedor_buscador">
<div class="fondo_select">
<select class="estilo_select filtro" id="genero" name="genero">
 <option style="background-color: #999;" value = "">Seleccione la zona
 </option>
 <?php if ($zonageografica != Null):
 	foreach ($zonageografica as $zona) {?>
<option style="background-color: #999;" value = "<?php echo $zona -> zonaID; ?>" title="<?php echo $zona -> zona;?>"> <?php echo $zona -> zona;?>
 </option>
 <?php } endif;?>
 <option style="background-color: #999;" value = "9" title="Todas"> Todas
 </option>

</select>
</div>
</div>

<div class="subtitulo">
ZONA- <label id="zonaNombre"><label id="nombreZona">Seleccione la zona</label></label>
</div>



</br>

<div id="tablasDinamicasA">
<!--       CONTENIDO SUPERIOR       -->
<table class="tabla_carrito superior" width="990" style="display:none">
<tr>
<th width="84">
Nivel 1
</th>
<th width="81">
Nivel 2
</th>
<th width="88">
Nivel 3
</th>
<th width="137">
Tipo
</th>
<th width="136">
Ubicación
</th>
<th width="310">
Contenido
</th>
<th width="122">
Ajustes
</th>
</tr>
<tr>
<td bgcolor="#E6E7E8" class="nivel">
BP00001
</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">
Banner Publicidad
</td>
<td bgcolor="#E6E7E8">
  Superior
</td>
<td bgcolor="#E6E7E8">

</td>

<td bgcolor="#E6E7E8">
<img src="<?php echo base_url()?>images/agregar.png" class="addContent" data-rel="1"/>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>

<tr >
<td>

</td>
<td>
00001
</td>
<td>

</td>
<td>
Imagen
</td>
<td>

</td>
<td>
<img src="<?php echo base_url()?>images/banner_superior/1.png" width="290" height="40" />
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>
<tr >
<td>

</td>
<td>
00002
</td>
<td>

</td>
<td>
Imagen
</td>
<td>

</td>
<td>
<img src="<?php echo base_url()?>images/banner_superior/2.png" width="290" height="40" />
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>

</td>

</tr>
<tr >
<td>

</td>
<td>
00003
</td>
<td>

</td>
<td>
Imagen
</td>
<td>

</td>
<td>
<img src="<?php echo base_url()?>images/banner_superior/3.png" width="290" height="40" />
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>
</table>
<!--       CONTENIDO SUPERIOR       -->



<!--       CONTENIDO MEDIO BANNER       -->
<table class="tabla_carrito medio" width="990" style="display:none">
<tr>
<th width="84">
Nivel 1
</th>
<th width="81">
Nivel 2
</th>
<th width="88">
Nivel 3
</th>
<th width="137">
Tipo
</th>
<th width="136">
Ubicación
</th>
<th width="310">
Contenido
</th>
<th width="122">
Ajustes
</th>
</tr>
<tr>
<td bgcolor="#E6E7E8" class="nivel">
BC00002
</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">
Banner Contenido
</td>
<td bgcolor="#E6E7E8">
   Centro
</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">
<img src="<?php echo base_url()?>images/agregar.png" class="addContent" data-rel="2"/>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>

<td>

</td>
<td>
00001
</td>
<td>

</td>
<td>
Imagen
</td>
<td>

</td>
<td>
<img src="<?php echo base_url()?>images/900x500_1.jpg" width="122" height="74"/>
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
<img src="<?php echo base_url()?>images/agregar.png" onclick="muestra('contenedor_modificaciones_texto');"/>
</td>

</tr>

<td>

</td>
<td>

</td>
<td>
00002
</td>
<td>
Texto
</td>
<td>

</td>
<td>
En nuestra seccion de Cruza encuentra la pareja perfecta para tu perrito.
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>

</table>
<!--       CONTENIDO MEDIO BANNER       -->



<!--       CONTENIDO MEDIO ARTICULO       -->
<table class="tabla_carrito medioContenido" width="990" style="display:none">
<tr>
<th width="84">
Nivel 1
</th>
<th width="81">
Nivel 2
</th>
<th width="88">
Nivel 3
</th>
<th width="137">
Tipo
</th>
<th width="136">
Ubicación
</th>
<th width="310">
Contenido
</th>
<th width="122">
Ajustes
</th>
</tr>
<tr class="imagenApoyo" style="display:none">
<td bgcolor="#E6E7E8" class="nivel">
BC00002
</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">
Imegen Contenido
</td>
<td bgcolor="#E6E7E8">
   Artículo
</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">
<img src="<?php echo base_url()?>images/agregar.png" class="addContent" data-rel="2"/>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>

<tr class="imagenApoyo" style="display:none">
<td>

</td>
<td>
00001
</td>
<td>

</td>
<td>
Imagen
</td>
<td>

</td>
<td>
<img src="<?php echo base_url()?>images/900x500_1.jpg" width="122" height="74"/>
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
<img src="<?php echo base_url()?>images/agregar.png" onclick="muestra('contenedor_modificaciones_texto');"/>
</td>

</tr>

<td>

</td>
<td>

</td>
<td>
00002
</td>
<td>
Texto
</td>
<td>

</td>
<td>
En nuestra seccion de Cruza encuentra la pareja perfecta para tu perrito.
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>

</table>
<!--       CONTENIDO MEDIO CONTENIDO       -->



<!--       CONTENIDO BANNER INFERIOR       -->
<table class="tabla_carrito inferior" width="990" style="display:none">
<tr>
<th width="84">
Nivel 1
</th>
<th width="81">
Nivel 2
</th>
<th width="88">
Nivel 3
</th>
<th width="137">
Tipo
</th>
<th width="136">
Ubicación
</th>
<th width="310">
Contenido
</th>
<th width="122">
Ajustes
</th>
</tr>
<tr>
<td bgcolor="#E6E7E8" class="nivel">
BP00003
</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">
Banner Publicidad
</td>
<td bgcolor="#E6E7E8"> Inferior
</td>
<td bgcolor="#E6E7E8">

</td>

<td bgcolor="#E6E7E8">
<img src="<?php echo base_url()?>images/agregar.png" class="addContent" data-rel="3"/>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>

<tr >
<td>

</td>
<td>
00001
</td>
<td>

</td>
<td>
Imagen
</td>
<td>

</td>
<td>
<img src="<?php echo base_url()?>images/banner_superior/1.png" width="290" height="40" />
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>
<tr >
<td>

</td>
<td>
00002
</td>
<td>

</td>
<td>
Imagen
</td>
<td>

</td>
<td>
<img src="<?php echo base_url()?>images/banner_superior/2.png" width="290" height="40" />
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>

</td>

</tr>
<tr >
<td>

</td>
<td>
00003
</td>
<td>

</td>
<td>
Imagen
</td>
<td>

</td>
<td>
<img src="<?php echo base_url()?>images/banner_superior/3.png" width="290" height="40" />
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>
</table>
<!--       CONTENIDO BANNER INFERIOR       -->
</div>
</div>

</body>

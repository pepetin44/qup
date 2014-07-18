<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.8.2.min.js"></script>
<script>
jQuery(document).ready(function(){

	 /*$(".seccion").click(function() {
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
     });*/
	 
	 $(".addContent").click(function() {
		 	
             var posicion = $(this).attr('data-rel');
			 $("#posicion").val(posicion);
             var uno = $("#posicion").val(posicion);
             
			 muestra('contenedor_modificaciones');
             console.log(uno);
     });

     /*$("#genero").change(
                function(){
                    var thisValue = $(this).val();
                    var nombreZona = $('#genero option:selected').html();
                    console.log(thisValue, nombreZona);
                    $("#nombreZona").detach();
             		$('<label id="nombreZona">'+nombreZona+'</label>').appendTo('#zonaNombre');
                    $("#zonaIDR").val(thisValue);
    }); */
	
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
	 
	$(".filtro").click(
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


<div id="personalizado">
<table class="tabla_carrito superior" width="990" style="display:">
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
<?php if($contenido != null):
	  $contador = 0;
	  foreach($contenido as $c):

	  if($posicion == 1 && $c->zonaID == $zonaID && $c->seccionID == $seccionID):?>
<tr >
<td>

</td>
<td>
<?=++$contador?>
</td>
<td>
<input type="hidden" id="bannerID" name="bannerID" value="<?=$c->bannerID?>"/>
</td>
<td>
Imagen
</td>




<td>

</td>
<td>
<img src="<?php echo base_url()?>images/banner_superior/<?php echo $c->imgbaner?>" width="290" height="40" />
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>
	  <?php 
	  endif;
	  endforeach;
	  endif; ?>
</table>
<!--       CONTENIDO SUPERIOR       -->

<?php if($c->seccionID == 1):?>

<!--       CONTENIDO MEDIO BANNER       -->
<table class="tabla_carrito medio" width="990" style="display:">
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

<?php if($contenido != null):
	  $contador = 0;
	  foreach($contenido as $c):

	  if($c->posicion == 2 && $c->zonaID == $zonaID && $c->seccionID == $seccionID):?>
<tr>
<td>

</td>
<td>
<?=++$contador?>
</td>
<td>
<input type="hidden" id="bannerID" name="bannerID" value="<?=$c->bannerID?>"/>
</td>
<td>
Imagen
</td>
<td>

</td>
<td>
<img src="<?php echo base_url()?>images/<?php echo $c->imgbaner?>" width="122" height="74"/>
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
<img src="<?php echo base_url()?>images/agregar.png" onclick="muestra('contenedor_modificaciones_texto');"/>
</td>

</tr>

<tr>

<td>

</td>
<td>

</td>
<td>
<?=$n = $contador + 1;?>
</td>
<td>
Texto
</td>
<td>

</td>
<td>
<?php echo $c->texto?>
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>
	  <?php 
	  endif;
	  endforeach;
	  endif; ?>
</table>
<!--       CONTENIDO MEDIO BANNER       -->


<?php else :?>
<!--       CONTENIDO MEDIO ARTICULO       -->
<table class="tabla_carrito medioContenido" width="990" style="display:">
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
<?php if($c->seccionID == 8 || $c->seccionID == 9 || $c->seccionID == 10):?>
<tr class="imagenApoyo" style="display:">
<td bgcolor="#E6E7E8" class="nivel">
BC00002
</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">
Imagen Contenido
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

<?php 
endif;
if($contenido != null):
	  $contador = 0;
	  foreach($contenido as $c):


	  if($posicion == 2 && $c->zonaID == $zonaID && $c->seccionID == $seccionID):
	  if($c->seccionID == 8 || $c->seccionID == 9 || $c->seccionID == 10):?>
<tr class="imagenApoyo" style="display:">
<td>

</td>
<td>
<?=++$contador?>
</td>
<td>
<input type="hidden" id="bannerID" name="bannerID" value="<?=$c->bannerID?>"/>
</td>
<td>
Imagen
</td>
<td>

</td>
<td>
<img src="<?php echo base_url()?>images/<?php echo $c->imgbaner?>" width="122" height="74"/>
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
<img src="<?php echo base_url()?>images/agregar.png" onclick="muestra('contenedor_modificaciones_texto');"/>
</td>

</tr>
<?php endif; ?>
<tr>
<td>

</td>
<td>

</td>
<td>
<?=$n = $contador + 1;?>
</td>
<td>
Texto
</td>
<td>

</td>
<td>
<?php echo $c->texto?></td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>
	  <?php 
	  endif;
	  endforeach;
	  endif; ?>
</table>
<!--       CONTENIDO MEDIO CONTENIDO       -->

<?php endif; ?>

<!--       CONTENIDO BANNER INFERIOR       -->
<table class="tabla_carrito inferior" width="990" style="display:">
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

<?php if($contenido != null):
	  $contador = 0;
	  foreach($contenido as $c):
	  
	  if($posicion == 3 && $c->zonaID == $zonaID && $c->seccionID == $seccionID):?>
<tr >
<td>

</td>
<td>
<?=++$contador?>
</td>
<td>
<input type="hidden" id="bannerID" name="bannerID" value="<?=$c->bannerID?>"/>
</td>
<td>
Imagen
</td>
<td>

</td>
<td>
<img src="<?php echo base_url()?>images/banner_inferior/<?=$c->imgbaner?>" width="290" height="40" />
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png"/>
</td>

</tr>
	  <?php 
	  endif;
	  endforeach;
	  endif; ?>

</table>
<!--       CONTENIDO BANNER INFERIOR       -->
</div>

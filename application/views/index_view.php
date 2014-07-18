<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quierounperro</title>
<link rel="shortcut icon" href="<?php echo base_url()?>images/ico.ico" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/reset.css" media="screen"></link>

<link rel="stylesheet" href="<?php echo base_url()?>css/nivo-slider.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="<?php echo base_url()?>css/responsiveslides.css">
 <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
 
 <link rel="stylesheet" href="<?php echo base_url()?>css/validator/validationEngine.jquery.css" type="text/css"/>

<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/validator/languages/jquery.validationEngine-es.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/validator/jquery.validationEngine.js"></script>
 
 
<!--<script src="<?php echo base_url()?>js/jquery-latest.js" type="text/javascript"></script>-->
<script src="<?php echo base_url()?>js/funciones_.js" type="text/javascript"></script>


<script>
if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1){

  document.write('<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/index_.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/general.css" media="screen"></link> ');
  }
if  (navigator.appName=="Microsoft Internet Explorer") {
	
	  document.write('<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/index_explorer.css" media="screen"></link>');}
  </script>

  <!-- [if lt IE ]>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/index_explorer.css" media="screen"></link>
  <![endif]-->

 <!-- <script src="<?php echo base_url()?>js/jquery_1.4.js" type="text/javascript"></script>-->
<!-- <script src="<?php echo base_url()?>js/jquery-1.10.2.js"></script>
 <script src="<?php echo base_url()?>js/jquery.validate.js" type="text/javascript"></script>-->
 <script src="<?php echo base_url()?>js/funciones_index.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/jquery.nivo.slider.js" type="text/javascript"></script>
 <script src="<?php echo base_url()?>js/responsiveslides.min.js"></script>
   <script src="<?php echo base_url()?>js/jquery-ui.js"></script>
 <!-- include jQuery library -->

<!-- include Cycle plugin -->
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.cycle.all.js"></script>  

<script>


function ajaxValidationCallback(status, form, json, options){
  if (status === true) {
        
        var data = json;
        console.log(data.response);
        if(data.response == true){
                               
                              $("#confirm").prepend('<label>Tu usuario ha sido creado exitosamente, por favor activa tu cuenta atravez del e-mail que ha sido enviado a tu cuenta de correo electronico. Para poder anunciarte y publicar anuncios, deberás registrar tu información completa. Esto lo podrás hacer en cualquier momento entrando a tu perfil.</label>');
                                muestra('contenedor_correcto'); 
                                oculta('contenedor_registro');                                                                            
          
        }                                                                          
  }
}

jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#registerNow").validationEngine({
				promptPosition           : "topRight",
				scroll                   : false,
				ajaxFormValidation       : true,
				ajaxFormValidationMethod : 'post',
        onAjaxFormComplete       : ajaxValidationCallback
			});

     
});

function showMap(){
  var user =  $( "input:checked" ).val();
    console.log(user);
  if (user == 1){
    $('#map-canvas').hide();
  }else {
    $('#map-canvas').show();
   }

}

function hideMap(){
  var user =  $( "input:checked" ).val();
    console.log(user);
   $('#map-canvas').hide();

}

    function updateDatabase(newLat, newLng){
      // make an ajax request to a PHP file
      // on our site that will update the database
      // pass in our lat/lng as parameters
      $("#newLat").val(newLat);
      $("#newLng").val(newLng);
      console.log(newLat,newLng);
    }


     



</script>

</head>
<body>

<script type="text/javascript">        
            jQuery(document).ready(function($) {                
                <?php if(isset($errorActivo) && isset($mensaje)): ?>
                        $('<label>Usuario Activado.</label>').appendTo('#specificError');
                        muestra('contenedor_error');
                        oculta('contenedor_registro');
                <?php endif; ?>
                <?php if(isset($errorActivo2) && isset($mensaje)): ?>
                        $('<label>Lamentablemente, el código de confirmación que intentas activar no existe.</label>').appendTo('#specificError');
                        muestra('contenedor_error');
                        oculta('contenedor_registro');
                <?php endif; ?>

                $( "input" ).on( "click", function() {
               var user =  $( "input:checked" ).val();
               console.log(user);
              if(user == 2){
       
                $('#map-canvas').show();
              }
              if (user == 3){
       
              $('#map-canvas').show();
              }
              });

       
            });
          </script>


<!--		CONTENEDOR LOGIN							-->
<!-- ------------------------------------------------------ -->
<form action="<?=base_url()?>sesion/login/principal/principal" id="login" method="post">
<div class="contenedor_login" id="contenedor_login" style="display:none;">
<div class="cerrar_registro"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_login');"/> </div>

<div class="registro_normal">
<div class="titulo_registro"> INGRESAR </div>
<div class="texto_inputs" >
<p> Usuario:</p>

<p style="margin-top:15px;">Contraseña:</p>

</div>

<div class="contendeor_inputs" >
<p><input type="text" name="correo"/> *</p>
<p><input type="password" name="contrasena"/> *</p>
</div>
</br>
<ul class="morado_reg">
<li>
<input type="submit" />
</li>
</ul>


<div class="subrayado" onclick="muestra('envio_con');">¿Olvidaste contraseña?</div>
<div id="envio_con" class="envio_con"> 
Se ha enviado contraseña al correo electronico indicado
</div>
<div class="subrayado" onclick="muestra('contenedor_registro');oculta('contenedor_login');"> Crear cuenta </div>
</br>

</div>

</div>
</form>
<!-- ------------------------------------------------------ -->
<!--		FIN    CONTENEDOR LOGIN							-->








<!--		CONTENEDOR REGISTRO							-->
<!-- ------------------------------------------------------ -->
<form action="<?php echo base_url()?>registro/registrar" id="registerNow" method="get" autocomplete="off" enctype="multipart/form-data">
<div class="contenedor_registro" id="contenedor_registro" style="display:none;"> <!-- Contenedor negro reistro-->
<div class="cerrar_registro"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_registro');"/> </div>


<div class="registro_normal"> <!-- Contenedor morado registro -->

<div class="titulo_registro"> REGISTRATE </div>

<div class="texto_inputs" >
<p> Nombre:</p>

<p style="margin-top:15px;">Apellido:</p>

<p style="margin-top:15px;">correo:</p>

<p style="margin-top:15px;">Telefono:</p>

<p style="margin-top:15px;">contrasena:</p>

<p>Confirmar contrasena:</p>

 </div>
<div class="contendeor_inputs" >
<p><input type="text" name="nombre" id="nombre" class="validate[required]"/> *</p>
<p><input type="text" name="apellido" id="apellido" class="validate[required]"/> *</p>

<p><input type="text" name="correo" class="validate[required,custom[email],ajax[isthereemail]]" /> *</p>

<p><input type="text" name="telefono" class="validate[custom[integer]]"/></p>

<p><input type="password" name="contrasena"  id="contrasena1" class="validate[required]"/> *</p>
</br>
<p><input type="password" name="confirmar"  id="contrasena2" class="validate[required,equals[contrasena1]]"/> *</p>


</div>

<div class=" informacion_adicional_registro">
<input type="radio" name="radiog_dark" id="radio1" class="css-checkbox" checked="checked"  value="1"/><label for="radio1" class="css-label radGroup2" onclick="obtener_usuario('datos_faltantes_usuario'); oculta('datos_faltantes_negocio');oculta('datos_faltantes_asociacion');oculta('ocultar_info_adicional');muestra('llenar_info_adicional');"> Usuario</label>
&nbsp;&nbsp;
<input type="radio" name="radiog_dark" id="radio2" class="css-checkbox" value="2"/>
<label for="radio2" class="css-label radGroup2" onclick="obtener_usuario('datos_faltantes_negocio');oculta('datos_faltantes_usuario');oculta('datos_faltantes_asociacion');oculta('ocultar_info_adicional');oculta('ocultar_info_adicional');muestra('llenar_info_adicional');"> Negocio </label>
&nbsp;&nbsp;
<input type="radio" name="radiog_dark" id="radio3" class="css-checkbox" value="3"/><label for="radio3" class="css-label radGroup2"  onclick="obtener_usuario('datos_faltantes_asociacion'); oculta('datos_faltantes_usuario');oculta('datos_faltantes_negocio');oculta('ocultar_info_adicional');oculta('ocultar_info_adicional');muestra('llenar_info_adicional');"> Asociación </label>
</br>
<p><input name="recibirCorreo" type="checkbox" value="1" /> <label> Quiero recibir información acerca de promociones </label></p>


<p><input name="terminosCondiciones" type="checkbox" value="1" class="validate[required]"/> <label> He leído y acepto los <a href="<?php echo base_url()?>#" class="link_blanco">Términos y Condiciones</a> y <a href="<?php echo base_url()?>#" class="link_blanco">la Política de Privacidad</a> </label></p>


<font class="asterisco">Los datos marcados con un astrisco (*) son obligatorios </font>
 </div>
 </br>
<div class="llenar_info_adicional" id="llenar_info_adicional" onclick="mostrar_formulario(); muestra('ocultar_info_adicional'); oculta('llenar_info_adicional');showMap();">
<input type="hidden" id="elegir_usuario" value="datos_faltantes_usuario"/>
 <img src="<?php echo base_url()?>images/flecha_blanca.png"/> Llenar información adicional </div>
 
<div class="llenar_info_adicional" id="ocultar_info_adicional" onclick="oculta('datos_faltantes_usuario');oculta('datos_faltantes_negocio');oculta('datos_faltantes_asociacion');oculta('ocultar_info_adicional'); muestra('llenar_info_adicional');hideMap();" style="display:none;">
 <img src="<?php echo base_url()?>images/flecha_blanca.png"/> Despues llenar información </div>

<div id="datos_faltantes_usuario" class="datos_faltantes_usuario" style="display:none;">
</br>
<div class="datos_fiscales"> Datos fiscales </div>


<div class="texto_inputs" >
<p> Razón Social:</p>

<p style="margin-top:15px;">RFC:</p>

<p style="margin-top:15px;">Calle:</p>

<p style="margin-top:15px;">No. Exterior:</p>

<p style="margin-top:15px;">CP:</p>

<p style="margin-top:15px;">Municipio:</p>

<p style="margin-top:15px;">Estado:</p>

<p style="margin-top:15px;">País:</p>


 </div>

<div class="contendeor_inputs" >
<p><input type="text" name="razon"/> </p>
<p><input type="text" name="RFC"/> </p>

<p><input type="text" name="calle"/> </p>

<p><input type="text" name="no_exterior"/></p>

<p><input type="text" name="cp"/> </p>

<p><input type="text" name="municipio"/> </p>
<p><select name="estado" id="estado">
     <option> --- </option>
  <?php 
  var_dump($estados);
    if($estados != null):
      foreach ($estados as $edo):
  ?>
      <option value="<?php echo $edo->estadoID?>"><?php echo $edo->nombreEstado ?></option>
    
    <?php endforeach;
    endif; ?>
   </select></p>
<p><select name="pais"> 
      <option value="147">México</option>
  <?php 
    if($paises != null):
      foreach ($paises as $pais):
  ?>
      <option value="<?php echo $pais->paisID?>"><?php echo $pais->nombrePais ?></option>
    
    <?php endforeach;
    endif; ?>
   </select> </p>


</div>



</div>



<div id="datos_faltantes_negocio" class="datos_faltantes_negocio" style="display:none;"> <!--- Inicio datos negocio -->


<div class="datos_fiscales"> Datos fiscales </div>

<div class="texto_inputs" >
<p> Razón Social:</p>

<p style="margin-top:15px;">RFC:</p>

<p style="margin-top:15px;">Calle:</p>

<p style="margin-top:15px;">No. Exterior:</p>

<p style="margin-top:15px;">CP:</p>

<p style="margin-top:15px;">Municipio:</p>

<p style="margin-top:15px;">Estado:</p>

<p style="margin-top:15px;">País:</p>


 </div>

<div class="contendeor_inputs" >
<p><input type="text" name="razonN"/> </p>
<p><input type="text" name="RFCN"/> </p>

<p><input type="text" name="calleN"/> </p>

<p><input type="text" name="no_exteriorN"/></p>

<p><input type="text" name="cpN"/> </p>

<p><input type="text" name="municipioN"/> </p>
<p><select name="estadoN">
     <option> --- </option>
  <?php 
    if($estados != null):
      foreach ($estados as $edo):
  ?>
      <option value="<?php echo $edo->estadoID?>"><?php echo $edo->nombreEstado ?></option>
    
    <?php endforeach;
    endif; ?>
   </select></p>
<p><select name="paisN"> 
      <option value="147">México</option>
  <?php 
    if($paises != null):
      foreach ($paises as $pais):
  ?>
      <option value="<?php echo $pais->paisID?>"><?php echo $pais->nombrePais ?></option>
    
    <?php endforeach;
    endif; ?>
   </select> </p>


</div>

<div class="datos_fiscales"> Datos del negocio </div>

<div class="texto_inputs" >
Nombre:
</div>

<div class="contendeor_inputs" >
<p><input type="text" name="nombre_negocio"/> </p>
</div>
<div class="giro_negocio"> 

<div class="contenedor_giros">
    <label>
      <input type="hidden" name="CheckboxGroup1[]" id="CheckboxGroup1[]" value="0" />
      <input type="checkbox" name="CheckboxGroup1[]" value="1" id="CheckboxGroup1_0" />
      Accesorios para mascotas</label>
    </br>
    <label>
      <input type="checkbox" name="CheckboxGroup1[]" value="2" id="CheckboxGroup1_1" />
      Veterinaria</label>
  </br>
  
     <label>
      <input type="checkbox" name="CheckboxGroup1[]" value="3" id="CheckboxGroup1_2" />
      Estetica canina</label>
          <label>
          </br>
      <input type="checkbox" name="CheckboxGroup1[]" value="4" id="CheckboxGroup1_3" />
    Adiestramiento canino</label>
    
  
  
  </div>
  
  <div class="contenedor_giros">
    <label>
      <input type="checkbox" name="CheckboxGroup1[]" value="5" id="CheckboxGroup1_4" />
     Centro de sociabilización</label>
    </br>

    <label>
      <input type="checkbox" name="CheckboxGroup1[]" value="6" id="CheckboxGroup1_5" />
     Criadero de perros</label>
  </br>
  
     <label>
      <input type="checkbox" name="CheckboxGroup1[]" value="7" id="CheckboxGroup1_6" />
      Hotel y pensión canina</label>
          <label>
          </br>
      <input type="checkbox" name="CheckboxGroup1[]" value="8" id="CheckboxGroup1_7" />
   Alimento y medicamento </label>
    
  
  
  </div>
   <div class="contenedor_giros">
    <label>
      <input type="checkbox" name="CheckboxGroup1[]" value="9" id="CheckboxGroup1_8" />
      Guarderia de perros</label>
    </br>
    <label>
      <input type="checkbox" name="CheckboxGroup1[]" value="10" id="CheckboxGroup1_9" />
      Tienda de mascotas</label>
  </br>
  
     <label>
      <input type="checkbox" name="CheckboxGroup1[]" value="11" id="CheckboxGroup1_10" />
      Servicios funerarios</label>
          <label>
          </br>
      <input type="checkbox" name="CheckboxGroup1[]" value="12" id="CheckboxGroup1_11" />
     Servico de paseo</label>
    
  
  
  </div>

</div>


<div class="texto_inputs" >
<p>Contacto:</p>

<p style="margin-top:15px;">Teléfono:</p>
<p style="margin-top:15px;">Calle:</p>
<p style="margin-top:15px;">Número:</p>
<p style="margin-top:15px;">Colonia:</p>
<p style="margin-top:15px;">Municipio:</p>
<p style="margin-top:15px;">Estado:</p>
<p style="margin-top:15px;">Código Postal:</p>
<p style="margin-top:15px;">correo:</p>
<p style="margin-top:15px;">Página web:</p>
<p style="margin-top:15px;">Logo:</p>
<p style="margin-top:15px;">Descripción:</p>
<p style="margin-top:35px;">Ubicación:</p>
</div>

<div class="contendeor_inputs" >
<p><input type="text" name="nombre_contactoN"/> </p>
<p><input style="margin-top:3px;" type="text" name="telefonoN1"/> </p>
<p><input style="margin-top:3px;" type="text" name="calleN1"/> </p>
<p><input style="margin-top:3px;" type="text" name="numN1"/> </p>
<p><input style="margin-top:3px;" type="text" name="coloniaN1"/> </p>
<p><input style="margin-top:3px;" type="text" name="municipioN1"/> </p>
<p><select name="estadoN1"/>
     <option> --- </option>
  <?php 
    if($estados != null):
      foreach ($estados as $edo):
  ?>
      <option value="<?php echo $edo->estadoID?>"><?php echo $edo->nombreEstado ?></option>
    
    <?php endforeach;
    endif; ?>
   </select> </p>
<p><input style="margin-top:3px;" type="text" name="cpN1"/> </p>
<p><input style="margin-top:3px;" type="text" name="correoN1"/> </p>
<p><input style="margin-top:3px;" type="text" name="pagina_webN1"/> </p>
<p><input style="margin-top:3px;" type="file" name="logoN1" id="logoN1"/> </p>
<p><textarea rows="3" cols="40" style="margin-top:3px;" name="descripcionN1"> </textarea> </p>


 
    
   
    
</div>




</div><!-- fin datos negocio--->



<div id="datos_faltantes_asociacion" class="datos_faltantes_asociacion" style="display:none;"> <!--- Inicio datos Asociación -->


<div class="datos_fiscales"> Datos fiscales </div>

<div class="texto_inputs" >
<p> Razón Social:</p>

<p style="margin-top:15px;">RFC:</p>

<p style="margin-top:15px;">Calle:</p>

<p style="margin-top:15px;">No. Exterior:</p>

<p style="margin-top:15px;">CP:</p>

<p style="margin-top:15px;">Municipio:</p>

<p style="margin-top:15px;">Estado:</p>

<p style="margin-top:15px;">País:</p>


 </div>

<div class="contendeor_inputs" >
<p><input type="text" name="razonAC"/> </p>
<p><input type="text" name="RFCAC"/> </p>

<p><input type="text" name="calleAC"/> </p>

<p><input type="text" name="no_exterioACr"/></p>

<p><input type="text" name="cpAC"/> </p>

<p><input type="text" name="municipioAC"/> </p>
<p><select name="estadoAC"/>
     <option> --- </option>
  <?php 
    if($estados != null):
      foreach ($estados as $edo):
  ?>
      <option value="<?php echo $edo->estadoID?>"><?php echo $edo->nombreEstado ?></option>
    
    <?php endforeach;
    endif; ?>
   </select></p>
<p><select name="paisAC"/> 
      <option value="147">México</option>
  <?php 
    if($paises != null):
      foreach ($paises as $pais):
  ?>
      <option value="<?php echo $pais->paisID?>"><?php echo $pais->nombrePais ?></option>
    
    <?php endforeach;
    endif; ?>
   </select> </p>


</div>

<div class="datos_fiscales"> Datos de la Asociación </div>




<div class="texto_inputs" >
<p> Nombre: </p>
<p style="margin-top:15px;">Contacto:</p>

<p style="margin-top:15px;">Teléfono:</p>
<p style="margin-top:15px;">Calle:</p>
<p style="margin-top:15px;">Número:</p>
<p style="margin-top:15px;">Colonia:</p>
<p style="margin-top:15px;">Municipio:</p>
<p style="margin-top:15px;">Estado:</p>
<p style="margin-top:15px;">Código Postal:</p>
<p style="margin-top:15px;">correo:</p>
<p style="margin-top:15px;">Página web:</p>
<p style="margin-top:15px;">Logo:</p>
<p style="margin-top:15px;">Descripción:</p>
<p style="margin-top:35px;">Ubicación:</p>
</div>

<div class="contendeor_inputs" >
<p><input type="text" name="nombre_ac"/> </p>
<p><input type="text" name="nombre_contactoAC1"/> </p>
<p><input style="margin-top:3px;" type="text" name="telefonoAC1"/> </p>
<p><input style="margin-top:3px;" type="text" name="calleAC1"/> </p>
<p><input style="margin-top:3px;" type="text" name="numAC1"/> </p>
<p><input style="margin-top:3px;" type="text" name="coloniaAC1"/> </p>
<p><input style="margin-top:3px;" type="text" name="municipioAC1"/> </p>
<p><select name="estadoAC1"/>
     <option> --- </option>
  <?php 
    if($estados != null):
      foreach ($estados as $edo):
  ?>
      <option value="<?php echo $edo->estadoID?>"><?php echo $edo->nombreEstado ?></option>
    
    <?php endforeach;
    endif; ?>
   </select> </p>
<p><input style="margin-top:3px;" type="text" name="cpAC1"/> </p>
<p><input style="margin-top:3px;" type="text" name="correoA1C"/> </p>
<p><input style="margin-top:3px;" type="text" name="pagina_webAC1"/> </p>
<p><input style="margin-top:3px;" type="file" name="logoAC1" id="logoAC1"/> </p>
<p><textarea rows="3" cols="40" style="margin-top:3px;" name="descripcionAC1"> </textarea> </p>

  
   
    
</div>




</div><!-- fin datos Asociacion -->

 <div id="map-canvas" style="display:none;">
 <?php $this->load->view($mapaSegundo);?>
 
 </div>  

<input type="hidden" name="newLat" id="newLat" value="" />
<input type="hidden" name="newLng" id="newLng" value="" />

</br>
<ul class="morado_reg">
<li><!--<a href="#" id="suscribir" style="text-decoration:none; color:#FFF;">Suscribirse</a>--><input type="submit" value="Suscribir" class="el_submit"/></li>
</ul>


</div><!-- fin contenedor morado registro -->

</div> <!-- Fin contenedor negro registro -->

</form>
<!--		FIN CONTENEDOR REGISTRO							-->
<!-- ------------------------------------------------------ -->




<!--		EXITO REGISTRO							-->
<!-- ------------------------------------------------------ -->
<div class="contenedor_registro" id="contenedor_correcto" style="display:none;"> <!-- Contenedor negro reistro-->
<div class="cerrar_registro"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_correcto');"/> </div>

<div class="registro_normal"> <!-- Contenedor morado registro -->

<div class="titulo_registro"> REGISTRATE </div>
</br>
<div class="imagen_confirmacion">
<img src="<?php echo base_url()?>images/palomita.png" />
</div>
<div class="contenido_confirmacion"> 
<strong> Correcto </strong>
</br></br>
<div> Bienvenido </div>
<div id="confirm">
</div>

 </div>
</div>
</br>


</div>

<!--		FIN EXITO REGISTRO						-->
<!-- ------------------------------------------------------ -->


<!--		ERROR REGISTRO							-->
<!-- ------------------------------------------------------ -->

<div class="contenedor_registro" id="contenedor_error" style="display:none;"> <!-- Contenedor negro reistro-->
<div class="cerrar_registro"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_error');"/> </div>

<div class="registro_normal"> <!-- Contenedor morado registro -->

<div class="titulo_registro"> REGISTRATE </div>
</br>
<div class="imagen_confirmacion">
<img src="<?php echo base_url()?>images/tache.png" />
</div>
<div class="contenido_confirmacion"> 
<strong> Ha ocurrido un error </strong>
</br>
<div id="specificError">

</div>
 </div>
</div>
</br>

</div>

</div>

<!--		FIN ERROR REGISTRO							-->
<!-- ------------------------------------------------------ -->


<div id="contenedor_publicar_anuncio" class="contenedor_publicar" style=" display:none">

<!-- Inicio contenedor pap publicar anuncio aunucio !--> 
<div id="publicar_anuncio" class="pubicar_anuncio_mini">



<!-- Inicio Paso UNO -->
<div id="paso_uno">
<div class="numeros_publicar_anuncio_mini">
<ul class="listado_numeros_anuncio_mini">
<li class="numero_seccion_mini">1</li>
<li>2</li>
<li>3</li>
<li>4</li>
<li>5</li>
</ul>
 </div>
<div class="crerar_publicar_anuncio_mini">
<img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_publicar_anuncio');"/>

 </div>
 </br>
<div class="descipcion_pasos_mini">
<div class="titulo_de_pasos_mini"> PUBLICAR   ANUNCIO </div>
<div class="instrucciones_pasos_mini"> Selecciona la sección de publicación</div>
<div class="contenido_indicacion_mini"> 
<img src="<?php echo base_url()?>images/pero_paso_uno.png" class="perro_paso_uno_mini"/>

<form id="form1" name="form1" method="post" class="radios_secciones_mini" action="">
<input type="radio" name="radiog_dark" id="radio4" class="css-checkbox" /><label for="radio4" class="css-label radGroup2"> Cruza</label>
</br>
<input type="radio" name="radiog_dark" id="radio5" class="css-checkbox" checked="checked"/>
<label for="radio5" class="css-label radGroup2">Venta</label>
</br>
<input type="radio" name="radiog_dark" id="radio6" class="css-checkbox" /><label for="radio6" class="css-label radGroup2">Adopción</label>
</br>
<input type="radio" name="radiog_dark" id="radio7" class="css-checkbox" /><label for="radio7" class="css-label radGroup2">Perros perdidos</label>
</form>

</br>
<ul class="morado_mini">
<li onclick="muestra('paso_dos'); oculta('paso_uno');">

Continuar
</li>
</ul> 


</div>

</div>

</div>
<!-- FIN anuncio UNO -->


<!-- Inicio paso DOS -->
<div id="paso_dos" style="display:none;">
<div  class="numeros_publicar_anuncio_mini" >
<ul class="listado_numeros_anuncio_mini">
<li >1</li>
<li class="numero_seccion_mini">2</li>
<li>3</li>
<li>4</li>
<li>5</li>
</ul>
 </div>
<div class="crerar_publicar_anuncio_mini">
<img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_publicar_anuncio');"/>

 </div>
 </br>
<div class="descipcion_pasos_mini">
<div class="titulo_de_pasos_mini"> PUBLICAR   ANUNCIO </div>
<div class="instrucciones_pasos_mini"> Indica tu tipo de anuncio</div>
<div class="contenido_indicacion_mini"> 
<div id="contenedor_paquetes" class="contenedor_paquetes_mini">



    
<div class="paquetes_izquierda_mini">
 <label>
  <div class="title_paquetes_mini">
<div class="lateral_lite_mini"></div>
  <img src="<?php echo base_url()?>images/perrito_lite.png" class="margen_mini" width="29" height="29"/> <font class="title_paquetes_titilos_mini"> PAQUETE LITE </font>
</div>
<div class="precio_paquete_lite_mini"><div class="el_titulo_paquete_lite_mini"> Gratis </div>  <div class="descripcion_precio_paquete_lite_mini">al crear tu usuario</div> </div>
 <div class="descripcion_paquetes_mini">
 <strong>Incluye:</strong>
<ul class="contenido_paquetes_mini">
<li>
* 1 fotos
</li>

<li>
* Texto de 50 caracteres 
</li>
<li>
 * Vigencia de 30 días.
</li>
</ul>
 </div>
 <div class="iconos_paquetes_mini">
 <ul>
 <li>
 <div class="cantidades_detalle_paquete_lite_mini"> 10 </div>
 <img src="<?php echo base_url()?>images/icono_camara.png" width="34" height="26"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_lite_mini"> 10 </div>
 <img src="<?php echo base_url()?>images/icono_texto.png" width="34" height="26"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_lite_mini"> 10 </div>
 <img src="<?php echo base_url()?>images/icono_calendario.png" width="34" height="26"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_of_mini"> 0 </div>
 <img src="<?php echo base_url()?>images/icono_ticket_of.png" width="34" height="26" />
 </li>
   <li>
   <div class="cantidades_detalle_paquete_of_mini"> 0 </div>
 <img src="<?php echo base_url()?>images/icono_video_of.png" width="34" height="26" />
 </li>
 </ul>
 </div>
  
 <input type="radio" style="margin-left:100px;" name="RadioGroup1"  value="radio" id="RadioGroup1_0" />
 </label>
 
</div>




<div class="paquetes_mini">
 <label>
<div class="title_paquetes_mini">
<div class="lateral_regular_mini"></div>
  <img src="<?php echo base_url()?>images/perrito_regular.png" class="margen" width="29" height="29"/> <font class="title_paquetes_titilos_mini"> PAQUETE REGULAR </font>

</div>
<div class="precio_paquete_regular_mini"> $89.00 </div>


 <div class="descripcion_paquetes_mini">
 <strong>Incluye:</strong>
<ul class="contenido_paquetes_mini">
<li>
* 5 fotos
</li>
<li>
* Texto de 150 caracteres 
</li>
<li>
* 1 video
</li>
<li>
 * 2 cupones
</li>
<li>
 * Vigencia de 30 días
</li>
</ul>
 </div>
 <div class="iconos_paquetes_mini">
 <ul>
 <li>
 <div class="cantidades_detalle_paquete_regular_mini"> 5 </div>
 <img src="<?php echo base_url()?>images/icono_camara_regular.png" width="34" height="26"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_regular_mini"> 150 </div>
 <img src="<?php echo base_url()?>images/icono_texto_regular.png" width="34" height="26" >
 </li>
  <li>
   <div class="cantidades_detalle_paquete_regular_mini"> 30 </div>
 <img src="<?php echo base_url()?>images/icono_calendario_regular.png" width="34" height="26"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_regular_mini"> 2 </div>
 <img src="<?php echo base_url()?>images/icono_ticket_regular.png" width="34" height="26" />
 </li>
   <li>
   <div class="cantidades_detalle_paquete_regular_mini"> 1 </div>
 <img src="<?php echo base_url()?>images/icono_video_regular.png" width="34" height="26" />
 </li>
 </ul>
 </div>
 <input type="radio" style="margin-left:100px;" name="RadioGroup1" value="radio" id="RadioGroup1_1" />
</label>
</div>




<div class="paquetes_derecha_mini">
<label>
<div class="title_paquetes_mini">
<div class="lateral_premium_mini"></div>
  <img src="<?php echo base_url()?>images/perrito_premium.png" class="margen" width="29" height="29"/> <font class="title_paquetes_titilos_mini"> PAQUETE PREMIUM </font>

</div>
 <div class="precio_paquete_premium_mini"> $165.00 </div>

 <div class="descripcion_paquetes_mini">
 <strong>Incluye:</strong>
<ul class="contenido_paquetes_mini">
<li>
* 15 fotos
</li>
<li>
* Caracteres ilimitados
</li>
<li>
* 2 video
</li>
<li>
 * 5 cupones
</li>
<li>
 * Vigencia de 60 días
</li>
</ul>
 </div>
 <div class="iconos_paquetes_mini">
 <ul>
 <li>
 <div class="cantidades_detalle_paquete_premium_mini"> 15 </div>
 <img src="<?php echo base_url()?>images/icono_camara_premium.png" width="34" height="26"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_premium_mini"> ∞ </div>
 <img src="<?php echo base_url()?>images/icono_texto_premium.png" width="34" height="26" >
 </li>
  <li>
   <div class="cantidades_detalle_paquete_premium_mini"> 60 </div>
 <img src="<?php echo base_url()?>images/icono_calendario_premium.png" width="34" height="26"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_premium_mini"> 5 </div>
 <img src="<?php echo base_url()?>images/icono_ticket_premium.png" width="34" height="26" />
 </li>
   <li>
   <div class="cantidades_detalle_paquete_premium_mini"> 2 </div>
 <img src="<?php echo base_url()?>images/icono_video_premium.png" width="34" height="26" />
 </li>
 </ul>
 </div>
  <input type="radio" style="margin-left:100px;" name="RadioGroup1" value="radio" id="RadioGroup1_2" />
 </label>
 </div>
 


 </div><!-- Contenedor de paquetes  -->
 
</br>
<ul class="morado_mini">
<li onclick="muestra('paso_tres'); oculta('paso_dos');">Continuar
</li>
</ul> 


</div>



</div>

</div> 

<!-- FIN paso dos !-->

<!-- INICIO paso TRES -->
<div id="paso_tres" style="display:none;" >
<div class="numeros_publicar_anuncio_mini">
<ul class="listado_numeros_anuncio_mini">
<li>1</li>
<li>2</li>
<li class="numero_seccion_mini">3</li>
<li>4</li>
<li>5</li>
</ul>
 </div>
 
<div class="crerar_publicar_anuncio_mini">
<img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_publicar_anuncio');"/>

 </div>
 </br>
<div class="descipcion_pasos_largo_mini">
<div class="titulo_de_pasos_mini"> PUBLICAR   ANUNCIO </div>
<div class="instrucciones_pasos_mini"> Completa tu información</div>
<div class="sub_instrucciones_pasos_mini"> Datos de contacto </div>
<div class="contenido_indicacion_formulario_mini"> 
<p class="margen_15_left_mini" >Nombre: <input type="text" class="background_morado_35_mini" readonly="readonly" /> Apellido: <input type="text" class="background_morado_35" readonly="readonly" />  Correo electrónico: <input type="text" class="background_morado" readonly="readonly" /> </p>
</br>
<p class="margen_15_left_mini"> Teléfono: <input type="text" class="background_gris_35_mini"/> Mostrar teléfono en el anuncio: <select class="background_gris_35_mini">
<option>--</option>
<option> Si </option>
<option> No </option>
</select>
</p>
</br>

<div class="sub_instrucciones_pasos_mini"> Detalles del aunucio </div>
</br>
<p class="margen_15_left_mini" >Sección: <input type="text" class="background_morado_55_mini" readonly="readonly" /> Paquete: <input type="text" class="background_morado_55_mini" readonly="readonly" />  Vencimiento: <input type="text" class="background_morado_mini" readonly="readonly" /> </p>
</br>
<p class="margen_15_left_mini"> Titúlo: &nbsp;&nbsp;&nbsp; <input type="text" class="background_gris_55_mini"/> Estado  &nbsp;&nbsp;&nbsp;&nbsp;<select class="background_gris_100_mini">
<option>--</option>
<option> Chihuahua </option>
<option> Quintana Roo </option>
</select>

Ciudad: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="background_gris_mini" type="text"/>
</p>
</br>

<p class="margen_15_left_mini"> Genéro: <select type="text" class="background_gris_100_mini"/>
<option> --- </option>
<option> Hembra </option>
<option> Macho </option>

</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 Raza  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="background_gris_100_mini">
<option>--</option>
<option> Labrador </option>
<option> Labrador</option>
</select>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Precio: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="background_gris_mini" type="text"/>
</p>
</br>
<p class="margen_15_left_mini">
Descripción:<textarea  class="background_gris_mini" cols="95" rows="3" > </textarea>
</p>
</br>
<p class="margen_15_left_mini">
Link de video <input type="text" size="98"/><img src="<?php echo base_url()?>images/logo_youtube.png"/>
</p>
<p class="margen_15_left_mini"> <a href="<?php echo base_url()?>#"> Tutorial para subir video a <img src="<?php echo base_url()?>images/logo_youtube.png" width="43" height="16"/> </a> </p>
</br>
<p class="margen_15_left_mini"> 

<!-- <iframe src="<?php echo base_url()?>../subir_archivos/index.html" style="overflow:none;" scrolling="no" width="800" height="100"> </iframe> -->
 </p>
 
 <div style="width:800px; height:150px;"> 

 TEXTO
 </div>
 
<ul class="morado_15_mini" style="margin-left:-15px;" >

<li onclick="muestra('paso_cuatro'); oculta('paso_tres');">

Continuar

</li>

</ul> 

</div>
</div>
</div>
<!-- FIN paso TRES -->

<div id="paso_cuatro" style="display:none;" > <!-- inicio del contendor paso 4 -->
 
<div class="numeros_publicar_anuncio_mini">
<ul class="listado_numeros_anuncio_mini">
<li>1</li>
<li>2</li>
<li >3</li>
<li class="numero_seccion_mini">4</li>
<li>5</li>
</ul>
 </div>

<div class="crerar_publicar_anuncio_mini">
<img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_publicar_anuncio');"/>

 </div>
 </br>
<div class="descipcion_pasos_largo_mini">
<div class="titulo_de_pasos_mini"> PUBLICAR   ANUNCIO </div>
<div class="instrucciones_pasos_mini"> Vista previa de tu anuncio</div>
<div class="leer_anuncio_mini">


<div class="contenedor_galeria_mini">
 <div id="slideshow_publicar_anuncio" class="picse_mini">
       <img src="<?php echo base_url()?>images/anuncios/02/1.png" width="294" height="200"/>
       <img src="<?php echo base_url()?>images/anuncios/02/2.png" width="294" height="200"/>
       <img src="<?php echo base_url()?>images/anuncios/02/3.png" width="294" height="200"/>
       <img src="<?php echo base_url()?>images/anuncios/02/1.png" width="294" height="200"/>
    </div>

</div>
<div class="datos_general_mini">

<div class="titulo_anuncio_publicado_mini">
VENDO BONITO PERRO
</br>
VENDO
</div>
</br>
<strong>
Precio:
</strong>

</br>
<font> Fecha de publicacion:12-06-2014</font>
</br>
<font>Sección: Venta</font>
</br>
<font>Raza: Cairn Terrier</font>
</br>
<font>Género: Macho</font>
</br>
<font>Lugar: Queretaro (Queretaro)</font>

</br>
</br>
<ul class="boton_naranja_mini">
<li onclick="muestra('contenedor_contactar_previo');">
Contactar al anunciante
</li>
</ul>
</br>
<ul class="boton_gris_mini">
<li>
<img src="<?php echo base_url()?>images/favorito.png"/>Agregar a Favoritos
</li>
</ul>

</div>
</br>

<div class="contenedor_del_detalle_mini">

<div class="titulo_anuncio_publicado_mini">
MÁS DETALLES
</div>

<div class="descripcion_del_anuncio_mini">

ksdjfkjslfk fdglksj gkfdsjg  jgfkdjgkfd gfdgkdf gfdskj fgsfkjg sdlkf gjkfdsg fdlkgjdfl glfdsjg dflkgj dfgj flkgjf gjfd gfdjg fdlg fdlg fjgfd gjdslf gkgj lgjfgk gjfdkg lkgjf gjjkgj s
</div>
</br>
<ul class="boton_naranja_dos_mini">
<li id="ver_video" onclick="muestra('video_previo');">
Ver video
</li>
</ul>

<div id="video_previo" class="desplegar_detalles_mini" style="display:none;" >
</br>
<div class="titulo_anuncio_publicado_mini">
VIDEO
</div>

<iframe class="youtube_video_mini" src="<?php echo base_url()?>http://www.youtube.com/embed/YlmidIPuZ58"></iframe>


</div>



<ul class="boton_rojo_dos_mini">
<li>
<img src="<?php echo base_url()?>images/alert.png"/>
Denunciar Anuncio
</li>
</ul>

<div class="consejos_advertencias_mini">

- QuierounPerro.com te invita a que antes de comprar pienses en adoptar, ya que hoy en día hay millones de perros sin hogar que deben ser sacrificados.
</br>
- Tener un perro conlleva una serie de responsabilidades, cuidados y atenciones que debes considerar antes de comprar uno.
</br>
- Infórmate de los cuidados especiales que debes de tener con la raza específica que estás comprando.
</br>
- NUNCA compres una nueva mascota sin verla físicamente antes.
</br>
- NUNCA hagas depósitos o transferencias bancarias a través de medios donde tu dinero no pueda ser rastreado, como lo son Money Gram y Western Union.
</br>
- NUNCA pagues por un perro con registro de pedigree AKC si no te muestran los certificados, ya que corres el riesgo de que sea una estafa y nunca te los entreguen. Exige ver los papeles y asegúrate de que el nombre del criador esté en el certificado.
</br>
- Cuando vayas a ver al vendedor, nunca vayas solo y revisa los alrededores.
</br>
- El vendedor también debe estar interesado en ti y en manos de quién dejará a su perro.
</div>



</div>

</br>

</div>

<div id="contendedor_morado" class="contenedor_morado_mini">
<ul class="morado_15_sinmargen_mini" >

<li onclick="">

Editar

</li>
</ul> 

<ul class="morado_15_sinmargen_mini" >

<li onclick="muestra('paso_cinco'); oculta('paso_cuatro');">

Continuar

</li>

</ul> 
</div>

</div>

</div> <!-- final del contendor paso 4 -->


<!-- Inicio paso 5 -->
<div id="paso_cinco" style="display:none;"> 
<div class="numeros_publicar_anuncio_mini">
<ul class="listado_numeros_anuncio_mini">
<li>1</li>
<li>2</li>
<li >3</li>
<li >4</li>
<li class="numero_seccion_mini">5</li>
</ul>
 </div>
  </br>
<div class="crerar_publicar_anuncio_mini">
<img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_publicar_anuncio');"/>

 </div>

<div class="descipcion_pasos_mediano_mini">
<div class="titulo_de_pasos_mini"> PUBLICAR   ANUNCIO </div>
<div class="instrucciones_pasos_mini"> Detalle de compra: </div>
</br>
<div class="tipo_paquete_pago_mini">
<img src="<?php echo base_url()?>images/pago_lite.png"/>
</div>
<div class="divisor_morado_mini"> </div>

<div class="descripcion_paquete_pago_mini" > 
<div class="titulo_descripcion_paquete_mini"> INCLUYE </div>
<div style="padding:15px;">
<p> * 1 foto </p>
<p>* Texto de 50 caracteres </p>
<p>* Vigencia de 30 días. </p>
</div>
</div>
<div class="divisor_morado_mini"> </div>
<div class="tipo_paquete_pago_mini">
<div class="titulo_descripcion_paquete_mini"> TOTAL </div>
<div class="total_compra_mini"> <p> $ 89.00 <font class="moneda_mini"> MX </font></p>
</div>

</div>

</br>
</br>
<div style="margin-top:150px;">
<div class="sub_instrucciones_pasos_mini"> <img style=" margin-left:15px;" src="<?php echo base_url()?>images/mini_cupon.png"/> Cupones disponibles <font> 2 </font> </div>
<div style="padding:15px;">
<p>Si lo deseas pudes usar alguno de tus cupones</p>
<form  class="radios_cupones_mini" action="">
<input type="radio" name="radiog_dark" id="radio_pago1" class="css-checkbox" /><label for="radio_pago1" class="css-label radGroup2"> 10% de descuento</label>
</br>
<input type="radio" name="radiog_dark" id="radio_pago2" class="css-checkbox" checked="checked"/>
<label for="radio_pago2" class="css-label radGroup2">5% de descuento</label>
</br>
<input type="radio" name="radiog_dark" id="radio_pago3" class="css-checkbox" /><label for="radio_pago3" class="css-label radGroup2"> 20% de descuento</label>
</br>
</form>
</div>
</div>
<ul class="morado_15_mini" >

<li onclick="">
Pagar
</li>

</ul> 
</div>

</div> 
<!-- Fin  paso 5 -->


</div>
</div>




<div id="mini_menu" >
<input type="hidden" id="efecto" value="corre"/>
<img src="<?php echo base_url()?>images/bajar_menu_dos.png" id="bajar_menu" style="float:left; margin-left:10px;" onclick="oculta('bajar_menu'); muestra('menu_oculto');"/>
<div id="menu_oculto" class="menu_principal" style=" display:none;">
<div id="contenedor_menu_principal" class="contenedor_menu_principal"> 
<ul class="principal">
<li>
Inicio
</li>
<li>
 <a href="<?php echo base_url()?>venta.html"> Venta </a>
</li>
<li>
Cruza
</li>
<li>
Adopción
</li>
<li>
<a href="<?=base_url()?>principal/tienda">Tienda</a>
</li>
<li>
Directorio
</li>
</ul>
</div>
</div>
</div>

<div id="iconos_ocultos" class="iconos_ocultos">


<ul class="iconos_estatus">
<li>

<img id="horizontal_compras_mini"  onmouseover="mostrar_icono('horizontal_compras'); ocultar_icono('horizontal_compras_mini');"class="iconos_flotantes" src="<?php echo base_url()?>images/compras_horizontal_mini.png"/>

<img class="iconos_flotantes2" onmouseout="mostrar_icono('horizontal_compras_mini'); ocultar_icono('horizontal_compras');"  id="horizontal_compras" src="<?php echo base_url()?>images/compras_horizontal.png" onclick="window.location='carrito.html';"/>

</li>
<li>
<img id="horizontal_ingresar_mini" onmouseover="mostrar_icono('horizontal_ingresar'); ocultar_icono('horizontal_ingresar_mini');" class="iconos_flotantes" src="<?php echo base_url()?>images/ingresar_horizontal_mini.png"/>

<img class="iconos_flotantes2" onmouseout="mostrar_icono('horizontal_ingresar_mini'); ocultar_icono('horizontal_ingresar');" onclick="muestra('contenedor_login');" id="horizontal_ingresar" src="<?php echo base_url()?>images/ingresar_horizontal.png" />
</li>

<li>
<img id="horizontal_registrate_mini" onmouseover="mostrar_icono('horizontal_registrate'); ocultar_icono('horizontal_registrate_mini');"class="iconos_flotantes" src="<?php echo base_url()?>images/registrate_horizontal_mini.png"/>

<img class="iconos_flotantes2" onmouseout="mostrar_icono('horizontal_registrate_mini'); ocultar_icono('horizontal_registrate');" id="horizontal_registrate" src="<?php echo base_url()?>images/registrate_horizontal.png"/>
</li>
</ul>
</div>

<div class="">

<div class="contenedor_central_banner">

<div id="contenedor_central_superior" class="contenedor_central_superior">

<div id="banner_superior">
<img src="<?php echo base_url()?>images/logo.png" width="348" height="93" class="contenido_superior"/>

<div class="slideshow">
<img src="<?php echo base_url()?>images/banner_superior/1.png" width="638" height="93"/>
<img src="<?php echo base_url()?>images/banner_superior/2.png" width="638" height="93"/>
<img src="<?php echo base_url()?>images/banner_superior/3.png" width="638" height="93"/>
	</div>

</br>

</div>
</div>

<div class="menu_principal" id="menu_principal" >
<div id="contenedor_menu_principal" class="contenedor_menu_principal"> 
<ul class="principal">
<li>
Inicio
</li>
<li>
<a href="<?php echo base_url()?>venta.html"> Venta </a>
</li>
<li>
Cruza
</li>
<li>
Adopción
</li>
<li>
<a href="<?=base_url()?>principal/tienda">Tienda</a>
</li>
<li>
Directorio
</li>
</ul>
</div>
</div>

</div>

</div>

<center>
</br>
<div id="contenedor_central">

<div id="espacio_izquierda" class="seccion_izquierda">
<ul class="iconos" id="iconos_grandes">
<li onclick="window.location='<?=base_url()?>usuario/cuenta/carritoDetalle';"> <img src="<?php echo base_url()?>images/compras.png"/></li>
<li onclick="muestra('contenedor_login');"><img src="<?php echo base_url()?>images/sesion.png"/></li>
<li onclick="muestra('contenedor_registro');">
<img src="<?php echo base_url()?>images/registrate.png"/>
</li>
</ul>
</div>
<div id="banner_central">
       <div class="container" id="carousel_container">
    <div class="row">
      <div class="span12">
        <div id="artCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#artCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#artCarousel" data-slide-to="1"></li>
            <li data-target="#artCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active"><img src="<?php echo base_url()?>images/900x500_1.jpg" alt="Model 1">
              <div class="carousel-caption">
                <p>En nuestra seccion de Cruza encuentra la pareja perfecta para tu perrito.</p>
              </div>
            </div>
            <div class="item"><a href="<?php echo base_url()?>#" target="_blank"><img src="<?php echo base_url()?>images/900x500_2.jpg" alt="Model 2"></a>
            
             <div class="carousel-caption">
               Adopta a un perrito, sera tu compañero perfecto.
              </div>
            
            </div>
           <div class="item"><a href="<?php echo base_url()?>#" target="_blank"><img src="<?php echo base_url()?>images/900x500_3.jpg" alt="Model 2"></a>
            
             <div class="carousel-caption">
               Vende con nosotros a tus perritos.
              </div>
            
            </div>
          </div>
          <a class="left carousel-control" href="<?php echo base_url()?>#artCarousel" data-slide="prev">&lsaquo;</a> <a class="right carousel-control" href="<?php echo base_url()?>#artCarousel" data-slide="next">&rsaquo;</a> 
        </div>
      </div>
    </div>
  </div>
</div>

<div class="seccion_derecha" id="seccion_derecha">
<div id="contenido_fb" style="height:192px; margin-bottom:15px; ">
<!-- MyFavoritePetShop -->
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  <div class="fb-like-box" data-href="<?php echo base_url()?>https://www.facebook.com/interKreativa" data-height="192" data-width="215" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
</div>

<div id="banner_publicidad_derecha" class="slideshow_dos" style="height:200px; margin-top:10px;">
<img src="<?php echo base_url()?>images/banner_lateral/1.png" width="215" height="192"/>

<img src="<?php echo base_url()?>images/banner_lateral/2.png" alt="">
<img src="<?php echo base_url()?>images/banner_lateral/3.png" alt="">
   
</div>

</div>
<div id="contenedor_paquetes" class="contenedor_paquetes">


<a href="<?php echo base_url()?>#" onclick="muestra('contenedor_publicar_anuncio');" class="reset">
<div class="paquetes_izquierda">
<div class="title_paquetes">
<div class="lateral_lite"></div>
  <img src="<?php echo base_url()?>images/perrito_lite.png" class="margen"/> <font class="title_paquetes_titilos"> PAQUETE LITE </font>
</div>
<div class="precio_paquete_lite">  <div class="el_titulo_paquete_lite"> Gratis </div>  <div class="descripcion_precio_paquete_lite">al crear tu usuario</div> </div>
</br>
 <div class="descripcion_paquetes">
 <strong>Incluye:</strong>
<ul class="contenido_paquetes">
<li>
* 1 fotos
</li>

<li>
* Texto de 50 caracteres 
</li>
<li>
 * Vigencia de 30 días.
</li>
</ul>
 </div>
 <div class="iconos_paquetes">
 <ul>
 <li>
 <div class="cantidades_detalle_paquete_lite"> 10 </div>
 <img src="<?php echo base_url()?>images/icono_camara.png"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_lite"> 10 </div>
 <img src="<?php echo base_url()?>images/icono_texto.png" >
 </li>
  <li>
   <div class="cantidades_detalle_paquete_lite"> 10 </div>
 <img src="<?php echo base_url()?>images/icono_calendario.png"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_of"> 0 </div>
 <img src="<?php echo base_url()?>images/icono_ticket_of.png" />
 </li>
   <li>
   <div class="cantidades_detalle_paquete_of"> 0 </div>
 <img src="<?php echo base_url()?>images/icono_video_of.png" />
 </li>
 </ul>
 </div>

</div>
</a>
<a href="<?php echo base_url()?>#" class="reset">
<div class="paquetes">
<div class="title_paquetes">
<div class="lateral_regular"></div>
  <img src="<?php echo base_url()?>images/perrito_regular.png" class="margen"/> <font class="title_paquetes_titilos"> PAQUETE REGULAR </font>

</div>
<div class="precio_paquete_regular"> $89.00 </div>
</br>
 <div class="descripcion_paquetes">
 <strong>Incluye:</strong>
<ul class="contenido_paquetes">
<li>
* 5 fotos
</li>
<li>
* Texto de 150 caracteres 
</li>
<li>
* 1 video
</li>
<li>
 * 2 cupones
</li>
<li>
 * Vigencia de 30 días
</li>
</ul>
 </div>
 <div class="iconos_paquetes">
 <ul>
 <li>
 <div class="cantidades_detalle_paquete_regular"> 5 </div>
 <img src="<?php echo base_url()?>images/icono_camara_regular.png"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_regular"> 150 </div>
 <img src="<?php echo base_url()?>images/icono_texto_regular.png" >
 </li>
  <li>
   <div class="cantidades_detalle_paquete_regular"> 30 </div>
 <img src="<?php echo base_url()?>images/icono_calendario_regular.png"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_regular"> 2 </div>
 <img src="<?php echo base_url()?>images/icono_ticket_regular.png" />
 </li>
   <li>
   <div class="cantidades_detalle_paquete_regular"> 1 </div>
 <img src="<?php echo base_url()?>images/icono_video_regular.png" />
 </li>
 </ul>
 </div>

</div>

</a>
<a href="<?php echo base_url()?>#" class="reset">
<div class="paquetes_derecha">
<div class="title_paquetes">
<div class="lateral_premium"></div>
  <img src="<?php echo base_url()?>images/perrito_premium.png" class="margen"/> <font class="title_paquetes_titilos"> PAQUETE PREMIUM </font>

</div>
 <div class="precio_paquete_premium"> $165.00 </div>
</br>
 <div class="descripcion_paquetes">
 <strong>Incluye:</strong>
<ul class="contenido_paquetes">
<li>
* 15 fotos
</li>
<li>
* Caracteres ilimitados
</li>
<li>
* 2 video
</li>
<li>
 * 5 cupones
</li>
<li>
 * Vigencia de 60 días
</li>
</ul>
 </div>
 <div class="iconos_paquetes">
 <ul>
 <li>
 <div class="cantidades_detalle_paquete_premium"> 15 </div>
 <img src="<?php echo base_url()?>images/icono_camara_premium.png"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_premium"> ∞ </div>
 <img src="<?php echo base_url()?>images/icono_texto_premium.png" >
 </li>
  <li>
   <div class="cantidades_detalle_paquete_premium"> 60 </div>
 <img src="<?php echo base_url()?>images/icono_calendario_premium.png"/>
 </li>
  <li>
   <div class="cantidades_detalle_paquete_premium"> 5 </div>
 <img src="<?php echo base_url()?>images/icono_ticket_premium.png" />
 </li>
   <li>
   <div class="cantidades_detalle_paquete_premium"> 2 </div>
 <img src="<?php echo base_url()?>images/icono_video_premium.png" />
 </li>
 </ul>
 </div>
 </div>
</a>
 </div><!-- Contenedor de paquetes  -->
 
 
 <!-- Inician secciones de contenido -->
 <!-- perros perdidos -->
 <a href="<?php echo base_url()?>#"  style="text-decoration:none; color:#000;" onmouseover="Mostrar('ver_perdidos');Ocultar('ver_raza');Ocultar('ver_mes');Ocultar('ver_curiosos');" >
<div  id="perros_perdidos" class="seccion_inferior_izquierda" >

<div class="contenido_secciones">
<p class="titulo_segunda_seccion"> PERROS PERDIDOS </p>
<p> <strong> Nombre:</strong> Lazy
<strong>Raza:</strong> Akita
<strong>Caracteristicas:</strong> Akita de color blanco, con cafe...</p>

</div>
<div  class="sub_imagenes_dos" >

<img align="center" class="imagen_relleno" src="<?php echo base_url()?>images/perros_perdidos/perro1.png" />

<div id="ver_perdidos" class="ver_mas" style=" display:none;">  Ver más...  </div>

</div>
</div>
</div>
</a>
<!-- End perros perdidos -->
<!-- Raza del mes -->
<a href="<?php echo base_url()?>#" style="text-decoration:none; color:#000;" onmouseover="Mostrar('ver_raza'); Ocultar('ver_perdidos');Ocultar('ver_mes'); Ocultar('ver_curiosos')" >
<div id="la_raza_mes" class="seccion_inferior_izquierda">
<div class="contenido_secciones">
<p class="titulo_segunda_seccion"> LA RAZA DEL MES </p>
<p> 
 El perro de raza labrador es el prototipo del perro de familia, ya que sue... 
</p>

</div>
<div  class="sub_imagenes_dos" >

<img align="center" class="imagen_relleno" src="<?php echo base_url()?>images/raza_mes/la_raza.png" width="87" height="103" />


<div id="ver_raza" class="ver_mas" style=" display:none;">  Ver más...  </div>

</div>
</div>
</a>
<!-- End raza del mes -->

<!-- Eventos del mes -->
<a href="<?php echo base_url()?>#" style="text-decoration:none; color:#000;" onmouseover="Mostrar('ver_mes');Ocultar('ver_raza'); Ocultar('ver_perdidos');Ocultar('ver_curiosos');" >
<div id="eventos_mes" class="seccion_inferior">
<div class="contenido_secciones">
<p class="titulo_segunda_seccion"> EVENTOS DEL MES </p>

<p> Título: Expo Can México 2013.
Fecha del evento: Del 13 al 22 de...
</p>

</div>
<div  class="sub_imagenes_dos">
<img class="imagen_relleno" src="<?php echo base_url()?>images/eventos/eventos_mes.jpg" width="144" height="110" />
<div id="ver_mes" class="ver_mas" style=" display:none;">  Ver más...  </div>

</div>
</div>
</a>
<!-- End eventos del mes -->
<!-- Datos curiosos -->
<a href="<?php echo base_url()?>#" style="text-decoration:none; color:#000;" onmouseover="Mostrar('ver_curiosos');Ocultar('ver_raza'); Ocultar('ver_perdidos');Ocultar('ver_mes');" >
<div id="datos_curiosos" class="seccion_inferior_derecha">
<div class="contenido_secciones">
<p class="titulo_segunda_seccion"> DATOS CURIOSOS </p>

<p> 
La primera semana de vida del cachorro la pasa el 90% del tiempo dormido...
</p>

</div>
<div  class="sub_imagenes_dos">
<img class="imagen_relleno" src="<?php echo base_url()?>images/curiosos/curiosos1.png" width="63" height="119" />

<div id="ver_curiosos" class="ver_mas" style=" display:none;">  Ver más...  </div>

</div>

</div>
</a>
<!-- End datos curioso -->

</div><!-- Contenedor central -->


<div class="separacion_final" >

</div>

<div id="menu_inferior" align="center" >
<div id="acerca_nosotros" class="menu_inferiror">
<p class="title_final">Acerca de nosotros</p>
<div class="contenido_final">
<ul class="sub_menu_inferior">
<li>  - ¿Quiénes Somos? 
</li>
<li>- La comunidad QUP </li>
</ul>
</div>
</div>
<div id="politicas" class="menu_inferiror">
<p class="title_final">Políticas</p>
<div class="contenido_final">
<ul class="sub_menu_inferior">
<li> - Aviso de Privacidad </li>
<li>  - Política de Provacidad </li>
<li> - Términos y Condiciones </li>
</ul>
</div>
</div>
<div id="contacto" class="menu_inferiror">
<p class="title_final">Contacto</p>
<div class="contenido_final">
<ul class="sub_menu_inferior">
<li>- Tutorial</li>
<li>- Publicidad </li>
<li>- Soporte </li>
<li>- Preguntas Frecuentes </li>
</ul>
</div>
</div>
</div>
</br>
</br>
</br>
</br></br>
</br></br>
</br>
<div class="footer">
<img src="<?php echo base_url()?>images/perro_final.png" width="46" height="42"/>
<a href="<?php echo base_url()?>#" ><img  src="<?php echo base_url()?>images/ico_fb.png" width="32" height="32" style="margin-top:10px;"/></a>
<a href="<?php echo base_url()?>#" class="margen"><img src="<?php echo base_url()?>images/ico_tw.png" width="32" height="32" style="margin-top:10px;"/></a>
</div>
<div class="division_final">

</div>
<div class="pie_pagina">
Copyright © 2014 QuieroUnPerro.com
</div>
</center>
<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
  <script>
    $('#artCarousel').carousel({
      interval: 4000,
	  effect:'random',
      cycle: true
    });
  </script>
  
  
  

</body>
</html>

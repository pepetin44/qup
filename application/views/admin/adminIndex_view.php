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
<body>

<div class="contenedor_modificaciones" id="contenedor_modificaciones" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_modificaciones');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
AGREGAR IMAGEN
</div>

<div class="contenido_intruciones">
<p>Ingrese las imagenes para BP00001:</p>
</br>
<input type="file" />



</div>
<ul class="morado_reg">
<li>
Guardar
</li>
</ul>

</div>

</div> <!-- Fin contenedor negro imagenes -->


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





<div class="encabezado">
<img  src="<?php echo base_url()?>images/logo_admin.png" width="258" height="88"  />

<div class="menu_admin">
<ul class="el_menu">
<li>
Pantallas
<ul>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Inicio</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Venta</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Cruza</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Directorio</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Prefil de usuario</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Adopción</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Perros Perdidos</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> La raza del mes</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Evento del mes</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Datos curiosos</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Asociaciones Protectoras</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> ¿Quiénes somos?</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Tutorial</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Publicidad</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Preguntas frecuentes</a>
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

<div class="contenedor_central">
<div class="titulo_seccion">
PANTALLAS-INICIO
</div>
<div class="contenedor_buscador">
<div class="fondo_select">
<select   class="estilo_select" id="genero">
<option > Zona </option>
<option style="background-color: #999;"> Centro </option>
<option style="background-color: #999;"> Norte </option>

</select>
</div>
</div>

<div class="subtitulo">
ZONA- CENTRO
</div>

</br>
<table class="tabla_carrito" width="990">
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
<td bgcolor="#E6E7E8">
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
Inicio-Superior
</td>
<td bgcolor="#E6E7E8">

</td>

<td bgcolor="#E6E7E8">
<img src="<?php echo base_url()?>images/agregar.png" onclick="muestra('contenedor_modificaciones');"/>
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

<tr>
<td bgcolor="#E6E7E8">
BC00001
</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">
Banner Contenido
</td>
<td bgcolor="#E6E7E8">
Inicio- Centro
</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">
<img src="<?php echo base_url()?>images/agregar.png"/>
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

</div>

</body>

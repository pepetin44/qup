
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
AGREGAR PRODUCTO
</div>

<div class="contenido_intruciones">
<div class="texto_inputs">
<p> ID Producto: </p>
<p style="margin-top:15px;"> Nombre: </p>
<p style="margin-top:15px;"> Descripción: </p>
<p style="margin-top:15px;"> Costo: </p>
<p style="margin-top:15px;"> Talla: </p>
<p style="margin-top:15px;"> Color: </p>
<p style="margin-top:15px;"> Fotos: </p>
</div>

<div class="contendeor_inputs">
<p><input type="text" style="min-width:153px; height:20px;"/></p>
<p><input type="text" style="min-width:153px; height:20px;margin-top:10px;"/></p
<p><input type="text" style="min-width:153px; height:20px;  margin-top:10px;"/></p> 
<p><input type="text" style="min-width:153px; height:20px;  margin-top:10px;"/></p>
<p><select style="margin-top:15px;"> 
    <option> --- </option>
    <option> Chica </option>
    <option> Mediana </option>
    <option> Grande </option>
   </select></p>
<p><select  style="margin-top:15px;"> 
   <option> --- </option> 
   <option> Verde </option> 
   <option> Rosa </option>
   <option> Azul </option>     
   </select></p>
<p><input type="file" style="margin-top:15px;"/></p>
</div>

</div>

</br>
</br>

<ul class="morado_reg">
<li>
Guardar
</li>
</ul>

</div>

</div> <!-- Fin contenedor negro imagenes -->


<div class="contenedor_modificaciones" id="contenedor_eliminar" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_eliminar');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
ELIMINAR PRODUCTO
</div>
<div class="contenido_intruciones">
<p> ¿Esta seguro de eliminar el producto?


</div>
<ul class="morado_reg">
<li>
Eliminar
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
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Inicio</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Venta</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Cruza</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Directorio</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Prefil de usuario</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Adopción</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Perros Perdidos</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> La raza del mes</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Evento del mes</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Datos curiosos</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Asociaciones Protectoras</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> ¿Quiénes somos?</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Tutorial</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Publicidad</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Preguntas frecuentes</a>
</li>
</ul>
</li>
<li>
Usuarios
<ul>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Altas</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Bajas</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Consultas</a>
</li>
</ul>
</li>
<li>
Mensajes
<ul>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Redactar mensaje</a>
</li>
<li>
<a href="#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Enviar mensajes</a>
</li>
</ul>
</li>
<li>
Anuncios
</li>
<li>
Tienda
</li>
</ul>
</div>

</div> <!-- fin wncabezado -->

<div class="contenedor_central">
<div class="titulo_seccion">
PRODUCTOS-TIENDA
</div>
</br>
<table class="tabla_carrito" width="990">
<tr>
<th width="77">
ID del Producto
</th>
<th width="67">
Nombre
</th>
<th width="135">
Descripción
</th>
<th width="86">
Costo
</th>
<th width="66">
Talla
</th>
<th width="94">
Color
</th>
<th width="357">
Fotos
</th>
<th width="72">

</th>
</tr>
<tr>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">
<img src="<?php echo base_url()?>images/agregar.png" onclick="muestra('contenedor_modificaciones');"/>
</td>

</tr>

<tr >
<td>
000001
</td>
<td>
Shampoo
</td>
<td>
Shampoo para perros delicados
</td>
<td>
$20
</td>
<td>
Chica
</td>
<td>
---
</td>
<td>
<img src="<?php echo base_url()?>images/productos/01/01.png" width="70" height="70"/>
<img src="<?php echo base_url()?>images/productos/01/01.png" width="70" height="70"/>
<img src="<?php echo base_url()?>images/productos/01/01.png" width="70" height="70"/>
<img src="<?php echo base_url()?>images/productos/01/01.png" width="70" height="70"/>
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png" onclick="muestra('contenedor_eliminar');"/>
</td>

</tr>

</table>

</div>

</body>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrador-Quierounperro.com</title>
<link rel="shortcut icon" href="<?php echo base_url()?>images/ico.ico" />  
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/reset.css" media="screen"></link>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/administrador.css" media="screen"></link>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/general.css" media="screen"></link>
<body>

<div class="encabezado">
<img  src="<?php echo base_url()?>images/logo_admin.png" width="258" height="88"  />

<div class="menu_admin">
<ul class="el_menu">
<li>
Pantallas
<ul>
<li>
<a href="<?php echo base_url()?>pantallas_admin.html?inicio"> <img src="<?php echo base_url()?>images/ciculo.png" /> Inicio</a>
</li>
<li>
<a href="<?php echo base_url()?>pantallas_admin.html?venta"> <img src="<?php echo base_url()?>images/ciculo.png" /> Venta</a>
</li>
<li>
<a href="<?php echo base_url()?>pantallas_admin.html?cruza"> <img src="<?php echo base_url()?>images/ciculo.png" /> Cruza</a>
</li>
<li>
<a href="<?php echo base_url()?>pantallas_admin.html?directorio"> <img src="<?php echo base_url()?>images/ciculo.png" /> Directorio</a>
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
BIENVENIDO
</div>

<div class="contenedor_indicador">
<img src="<?php echo base_url()?>images/visitas_admin.png"/>
<div class="contadores">
<?php echo $visitas; ?>
</div>
</div>
<div style="margin-left:12px; margin-right:12px;" class="contenedor_indicador">
<img src="<?php echo base_url()?>images/usuarios.png"/>
<div class="contadores">
100000
</div>
</div>

<div class="contenedor_indicador">
<img src="<?php echo base_url()?>images/publicaciones.png"/>
<div class="contadores">
100000
</div>
</div>

</div>

</body>


#
# Dropping database objects
#

DROP TABLE IF EXISTS `zonageograficaestado`;
DROP TABLE IF EXISTS `zonageografica`;
DROP TABLE IF EXISTS `visita`;
DROP TABLE IF EXISTS `videos`;
DROP TABLE IF EXISTS `ubicacionusuario`;
DROP TABLE IF EXISTS `usuariodato`;
DROP TABLE IF EXISTS `roltienepermiso`;
DROP TABLE IF EXISTS `rol`;
DROP TABLE IF EXISTS `raza`;
DROP TABLE IF EXISTS `permiso`;
DROP TABLE IF EXISTS `pais`;
DROP TABLE IF EXISTS `mensajes`;
DROP TABLE IF EXISTS `giroempresa`;
DROP TABLE IF EXISTS `usuariodetalle`;
DROP TABLE IF EXISTS `fotostienda`;
DROP TABLE IF EXISTS `fotospublicacion`;
DROP TABLE IF EXISTS `publicaciones`;
DROP TABLE IF EXISTS `favoritos`;
DROP TABLE IF EXISTS `estado`;
DROP TABLE IF EXISTS `cuponadquirido`;
DROP TABLE IF EXISTS `cupondetalle`;
DROP TABLE IF EXISTS `serviciocontratado`;
DROP TABLE IF EXISTS `detallepaquete`;
DROP TABLE IF EXISTS `paquete`;
DROP TABLE IF EXISTS `cupon`;
DROP TABLE IF EXISTS `contenido`;
DROP TABLE IF EXISTS `contadormensajes`;
DROP TABLE IF EXISTS `compradetalle`;
DROP TABLE IF EXISTS `compra`;
DROP TABLE IF EXISTS `ci_sessions`;
DROP TABLE IF EXISTS `catalogoproductos`;
DROP TABLE IF EXISTS `carrito`;
DROP TABLE IF EXISTS `usuario`;
DROP TABLE IF EXISTS `banner`;
DROP TABLE IF EXISTS `seccion`;

#
# Structure for the `seccion` table : 
#

CREATE TABLE `seccion` (
  `seccionID` INTEGER(10) NOT NULL AUTO_INCREMENT,
  `seccionNombre` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`seccionID`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=16 AVG_ROW_LENGTH=1092 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `banner` table : 
#

CREATE TABLE `banner` (
  `bannerID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `imgbaner` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `texto` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `zonaID` INTEGER(11) NOT NULL DEFAULT 9,
  `posicion` INTEGER(11) DEFAULT NULL COMMENT '1 - arriba 2 - centro -3 abajo - 4 lateral',
  `seccionID` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`bannerID`, `zonaID`) COMMENT '',
   INDEX `pertenece` USING BTREE (`zonaID`) COMMENT '',
   INDEX `seccion` USING BTREE (`seccionID`) COMMENT '',
  CONSTRAINT `banner_fk1` FOREIGN KEY (`seccionID`) REFERENCES `seccion` (`seccionID`)
)ENGINE=InnoDB
AUTO_INCREMENT=4 AVG_ROW_LENGTH=5461 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `usuario` table : 
#

CREATE TABLE `usuario` (
  `idUsuario` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(39) COLLATE utf8_general_ci NOT NULL,
  `apellido` VARCHAR(65) COLLATE utf8_general_ci NOT NULL,
  `telefono` INTEGER(10) NOT NULL,
  `correo` VARCHAR(45) COLLATE utf8_general_ci NOT NULL,
  `contrasena` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `recepcionCorreo` INTEGER(1) NOT NULL DEFAULT 1 COMMENT '1 - recepción de correo activa\n 0 - recepción de correo inactiva',
  `tipoUsuario` INTEGER(1) NOT NULL DEFAULT 1 COMMENT '0 - Administrador\n1 - usuario normal\n2 - negocio\n3 - AC',
  `status` INTEGER(1) NOT NULL DEFAULT 0 COMMENT '0 - no activado\n1 - activo',
  `nivel` INTEGER(11) DEFAULT NULL COMMENT 'establecimiento de jerarquía en usuarios',
  `codigoConfirmacion` VARCHAR(100) COLLATE utf8_general_ci NOT NULL COMMENT 'código necesario para confirmar cuenta.',
  `fechaRegistro` DATETIME NOT NULL,
  `useragent` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  `last_ip_access` VARCHAR(16) COLLATE utf8_general_ci DEFAULT NULL,
  `authKey` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  `paqueteGratis` INTEGER(11) DEFAULT 1 COMMENT 'si paquete gratis = 1 no lo ha usado, si = 0 entonces ya tiene costo',
  PRIMARY KEY USING BTREE (`idUsuario`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=4 AVG_ROW_LENGTH=16384 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `carrito` table : 
#

CREATE TABLE `carrito` (
  `cartID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` INTEGER(11) DEFAULT NULL,
  `productoID` INTEGER(11) DEFAULT NULL,
  `cantidad` INTEGER(11) DEFAULT NULL COMMENT 'cantidad',
  `precio` FLOAT(5,2) DEFAULT NULL,
  `nombre` VARCHAR(120) COLLATE utf8_general_ci DEFAULT NULL,
  `detalle` VARCHAR(120) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY USING BTREE (`cartID`) COMMENT '',
   INDEX `usuarioID` USING BTREE (`usuarioID`) COMMENT '',
  CONSTRAINT `carrito_fk1` FOREIGN KEY (`usuarioID`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `catalogoproductos` table : 
#

CREATE TABLE `catalogoproductos` (
  `productoID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `descripcion` TEXT COLLATE utf8_general_ci NOT NULL,
  `sku` VARCHAR(30) COLLATE utf8_general_ci NOT NULL,
  `precio` FLOAT(5,2) NOT NULL,
  `foto` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY USING BTREE (`productoID`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=2 AVG_ROW_LENGTH=16384 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `ci_sessions` table : 
#

CREATE TABLE `ci_sessions` (
  `session_id` VARCHAR(40) COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `ip_address` VARCHAR(16) COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `user_agent` VARCHAR(120) COLLATE utf8_general_ci NOT NULL,
  `last_activity` INTEGER(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` TEXT COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`session_id`) COMMENT '',
   INDEX `last_activity_idx` USING BTREE (`last_activity`) COMMENT ''
)ENGINE=InnoDB
AVG_ROW_LENGTH=16384 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='tabla necesaria para CodeIgniter ... '
;

#
# Structure for the `compra` table : 
#

CREATE TABLE `compra` (
  `compraID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` INTEGER(11) NOT NULL,
  `subtotal` FLOAT(5,2) NOT NULL,
  `idCuponAdquirido` INTEGER(11) DEFAULT NULL,
  `descuento` INTEGER(2) DEFAULT NULL,
  `total` FLOAT(5,2) NOT NULL,
  `fecha` DATETIME NOT NULL,
  PRIMARY KEY USING BTREE (`compraID`) COMMENT '',
   INDEX `usuarioID` USING BTREE (`usuarioID`) COMMENT '',
  CONSTRAINT `compra_fk1` FOREIGN KEY (`usuarioID`) REFERENCES `usuario` (`idUsuario`)
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `compradetalle` table : 
#

CREATE TABLE `compradetalle` (
  `compraDetalleID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `compraID` INTEGER(11) NOT NULL,
  `productoID` INTEGER(11) NOT NULL,
  `cantidad` INTEGER(11) NOT NULL,
  `precio` FLOAT(5,2) NOT NULL,
  `nombre` VARCHAR(120) COLLATE utf8_general_ci NOT NULL,
  `detalle` VARCHAR(120) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`compraDetalleID`) COMMENT '',
   INDEX `compraID` USING BTREE (`compraID`) COMMENT '',
  CONSTRAINT `compradetalle_fk1` FOREIGN KEY (`compraID`) REFERENCES `compra` (`compraID`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `contadormensajes` table : 
#

CREATE TABLE `contadormensajes` (
  `contadorID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `cantMensajes` CHAR(20) COLLATE utf8_general_ci NOT NULL,
  `idUsuario` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`contadorID`) COMMENT '',
   INDEX `tiene` USING BTREE (`idUsuario`) COMMENT '',
  CONSTRAINT `tiene` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `contenido` table : 
#

CREATE TABLE `contenido` (
  `contenidoID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `seccionID` INTEGER(1) NOT NULL,
  `seccionDetalle` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `imagen` LONGBLOB NOT NULL,
  `texto` VARCHAR(500) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`contenidoID`) COMMENT '',
   INDEX `seccion` USING BTREE (`seccionID`) COMMENT '',
  CONSTRAINT `contenido_fk1` FOREIGN KEY (`seccionID`) REFERENCES `seccion` (`seccionID`)
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `cupon` table : 
#

CREATE TABLE `cupon` (
  `cuponID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombreCupon` VARCHAR(45) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`cuponID`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `paquete` table : 
#

CREATE TABLE `paquete` (
  `paqueteID` INTEGER(3) NOT NULL AUTO_INCREMENT,
  `nombrePaquete` VARCHAR(20) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`paqueteID`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=4 AVG_ROW_LENGTH=5461 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `detallepaquete` table : 
#

CREATE TABLE `detallepaquete` (
  `detalleID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `cantFotos` INTEGER(11) NOT NULL,
  `caracteres` INTEGER(11) NOT NULL,
  `vigencia` INTEGER(2) NOT NULL,
  `cupones` INTEGER(2) NOT NULL,
  `videos` INTEGER(2) NOT NULL,
  `precio` FLOAT(5,2) NOT NULL,
  `paqueteID` INTEGER(3) NOT NULL,
  PRIMARY KEY USING BTREE (`detalleID`, `paqueteID`) COMMENT '',
   INDEX `detallePaquete` USING BTREE (`paqueteID`) COMMENT '',
  CONSTRAINT `detallePaquete` FOREIGN KEY (`paqueteID`) REFERENCES `paquete` (`paqueteID`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=2 AVG_ROW_LENGTH=16384 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `serviciocontratado` table : 
#

CREATE TABLE `serviciocontratado` (
  `servicioID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `cantFotos` INTEGER(11) NOT NULL,
  `caracteres` INTEGER(11) NOT NULL,
  `vigencia` INTEGER(2) NOT NULL,
  `cupones` INTEGER(2) NOT NULL,
  `videos` INTEGER(2) NOT NULL,
  `precio` FLOAT(5,2) NOT NULL,
  `detalleID` INTEGER(11) NOT NULL,
  `paqueteID` INTEGER(3) NOT NULL,
  `idUsuario` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`servicioID`, `detalleID`, `paqueteID`) COMMENT '',
   INDEX `historicoPaquete` USING BTREE (`detalleID`, `paqueteID`) COMMENT '',
   INDEX `detallePaqueteUsuario` USING BTREE (`idUsuario`) COMMENT '',
  CONSTRAINT `detallePaqueteUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `historicoPaquete` FOREIGN KEY (`detalleID`, `paqueteID`) REFERENCES `detallepaquete` (`detalleID`, `paqueteID`)
)ENGINE=InnoDB
AUTO_INCREMENT=2 AVG_ROW_LENGTH=16384 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `cupondetalle` table : 
#

CREATE TABLE `cupondetalle` (
  `cuponDetalleID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `valor` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `vigencia` INTEGER(2) NOT NULL,
  `tipoCupon` INTEGER(1) NOT NULL,
  `cuponID` INTEGER(11) NOT NULL,
  PRIMARY KEY USING BTREE (`cuponDetalleID`, `cuponID`) COMMENT '',
   INDEX `detalleCupon` USING BTREE (`cuponID`) COMMENT '',
  CONSTRAINT `detalleCupon` FOREIGN KEY (`cuponID`) REFERENCES `cupon` (`cuponID`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `cuponadquirido` table : 
#

CREATE TABLE `cuponadquirido` (
  `idCuponAdquirido` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `valor` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `vigencia` DATE NOT NULL,
  `tipoCupon` INTEGER(1) NOT NULL,
  `vigente` TINYINT(1) NOT NULL,
  `usado` TINYINT(1) NOT NULL,
  `servicioID` INTEGER(11) NOT NULL,
  `detalleID` INTEGER(11) NOT NULL,
  `paqueteID` INTEGER(3) NOT NULL,
  `cuponDetalleID` INTEGER(11) DEFAULT NULL,
  `cuponID` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`idCuponAdquirido`, `servicioID`, `detalleID`, `paqueteID`) COMMENT '',
   INDEX `detalleCuponPaquete` USING BTREE (`servicioID`, `detalleID`, `paqueteID`) COMMENT '',
   INDEX `historicoCupon` USING BTREE (`cuponDetalleID`, `cuponID`) COMMENT '',
  CONSTRAINT `detalleCuponPaquete` FOREIGN KEY (`servicioID`, `detalleID`, `paqueteID`) REFERENCES `serviciocontratado` (`servicioID`, `detalleID`, `paqueteID`),
  CONSTRAINT `historicoCupon` FOREIGN KEY (`cuponDetalleID`, `cuponID`) REFERENCES `cupondetalle` (`cuponDetalleID`, `cuponID`)
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `estado` table : 
#

CREATE TABLE `estado` (
  `estadoID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombreEstado` VARCHAR(30) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`estadoID`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=34 AVG_ROW_LENGTH=496 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `favoritos` table : 
#

CREATE TABLE `favoritos` (
  `publicacionID` INTEGER(11) NOT NULL,
  `idUsuario` INTEGER(11) DEFAULT NULL,
   INDEX `favoritos` USING BTREE (`idUsuario`) COMMENT '',
  CONSTRAINT `favoritos` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `publicaciones` table : 
#

CREATE TABLE `publicaciones` (
  `publicacionID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `seccion` INTEGER(1) NOT NULL,
  `titulo` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `vigente` TINYINT(1) NOT NULL,
  `fechaCreacion` DATE NOT NULL,
  `fechaVencimiento` DATE NOT NULL,
  `numeroVisitas` INTEGER(11) NOT NULL,
  `estadoID` INTEGER(11) NOT NULL,
  `genero` TINYINT(1) NOT NULL,
  `razaID` CHAR(20) COLLATE utf8_general_ci NOT NULL,
  `precio` FLOAT(5,2) NOT NULL,
  `descripcion` TEXT COLLATE utf8_general_ci NOT NULL,
  `muestraTelefono` TINYINT(1) NOT NULL,
  `aprobada` TINYINT(1) NOT NULL,
  `servicioID` INTEGER(11) NOT NULL,
  `detalleID` INTEGER(11) NOT NULL,
  `paqueteID` INTEGER(3) NOT NULL,
  PRIMARY KEY USING BTREE (`publicacionID`, `servicioID`, `detalleID`, `paqueteID`) COMMENT '',
   INDEX `contenidoPublicacion` USING BTREE (`servicioID`, `detalleID`, `paqueteID`) COMMENT '',
  CONSTRAINT `contenidoPublicacion` FOREIGN KEY (`servicioID`, `detalleID`, `paqueteID`) REFERENCES `serviciocontratado` (`servicioID`, `detalleID`, `paqueteID`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=2 AVG_ROW_LENGTH=16384 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `fotospublicacion` table : 
#

CREATE TABLE `fotospublicacion` (
  `foto` LONGBLOB NOT NULL,
  `publicacionID` INTEGER(11) NOT NULL,
  `servicioID` INTEGER(11) NOT NULL,
  `detalleID` INTEGER(11) NOT NULL,
  `paqueteID` INTEGER(3) NOT NULL,
  PRIMARY KEY USING BTREE (`publicacionID`, `servicioID`, `detalleID`, `paqueteID`) COMMENT '',
  CONSTRAINT `publicacionFotos` FOREIGN KEY (`publicacionID`, `servicioID`, `detalleID`, `paqueteID`) REFERENCES `publicaciones` (`publicacionID`, `servicioID`, `detalleID`, `paqueteID`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `fotostienda` table : 
#

CREATE TABLE `fotostienda` (
  `fotoID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `foto` LONGBLOB NOT NULL,
  `productoID` INTEGER(11) NOT NULL,
  PRIMARY KEY USING BTREE (`fotoID`) COMMENT '',
   INDEX `productoID` USING BTREE (`productoID`) COMMENT '',
  CONSTRAINT `fotostienda_fk1` FOREIGN KEY (`productoID`) REFERENCES `catalogoproductos` (`productoID`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `usuariodetalle` table : 
#

CREATE TABLE `usuariodetalle` (
  `idusuarioDetalle` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` INTEGER(11) NOT NULL,
  `tipoUsuario` INTEGER(1) NOT NULL,
  `nombreNegocio` VARCHAR(80) COLLATE utf8_general_ci NOT NULL,
  `giro` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `nombreContacto` VARCHAR(45) COLLATE utf8_general_ci NOT NULL,
  `telefono` VARCHAR(45) COLLATE utf8_general_ci NOT NULL,
  `calle` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `numero` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `idEstado` INTEGER(11) DEFAULT NULL,
  `colonia` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `cp` INTEGER(11) DEFAULT NULL,
  `correo` VARCHAR(45) COLLATE utf8_general_ci NOT NULL,
  `paginaWeb` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `logo` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `descripcion` TINYTEXT COLLATE utf8_general_ci,
  PRIMARY KEY USING BTREE (`idusuarioDetalle`, `idUsuario`) COMMENT '',
   INDEX `detalleUsuario` USING BTREE (`idUsuario`) COMMENT '',
   INDEX `idusuarioDetalle` USING BTREE (`idusuarioDetalle`) COMMENT '',
  CONSTRAINT `detalleUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='Ambos usuarios, Negocio y AC comparten estos datos, por lo cual ambos se almacenan en esta tabla'
;

#
# Structure for the `giroempresa` table : 
#

CREATE TABLE `giroempresa` (
  `giroEmpresaID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `idUsuarioDetalle` INTEGER(11) NOT NULL,
  `giroID` INTEGER(11) NOT NULL,
  PRIMARY KEY USING BTREE (`giroEmpresaID`) COMMENT '',
   INDEX `idUsuarioDetalle` USING BTREE (`idUsuarioDetalle`) COMMENT '',
  CONSTRAINT `giroempresa_fk1` FOREIGN KEY (`idUsuarioDetalle`) REFERENCES `usuariodetalle` (`idusuarioDetalle`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `mensajes` table : 
#

CREATE TABLE `mensajes` (
  `mensajeID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `asunto` VARCHAR(30) COLLATE utf8_general_ci NOT NULL,
  `mensaje` VARCHAR(300) COLLATE utf8_general_ci NOT NULL,
  `idUsuario` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`mensajeID`) COMMENT '',
   INDEX `mensajes` USING BTREE (`idUsuario`) COMMENT '',
  CONSTRAINT `mensajes` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `pais` table : 
#

CREATE TABLE `pais` (
  `paisID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `PAIS_ISONUM` SMALLINT(6) DEFAULT NULL,
  `PAIS_ISO2` CHAR(2) COLLATE utf8_general_ci DEFAULT NULL,
  `PAIS_ISO3` CHAR(3) COLLATE utf8_general_ci DEFAULT NULL,
  `nombrePais` VARCHAR(80) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY USING BTREE (`paisID`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=241 AVG_ROW_LENGTH=68 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `permiso` table : 
#

CREATE TABLE `permiso` (
  `idPermiso` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nivel` INTEGER(11) NOT NULL,
  `nombrePermiso` VARCHAR(70) COLLATE utf8_general_ci NOT NULL,
  `borrado` INTEGER(11) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`idPermiso`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=5 AVG_ROW_LENGTH=4096 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `raza` table : 
#

CREATE TABLE `raza` (
  `razaID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `raza` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY USING BTREE (`razaID`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `rol` table : 
#

CREATE TABLE `rol` (
  `idRol` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` VARCHAR(45) COLLATE utf8_general_ci NOT NULL,
  `borrado` INTEGER(11) NOT NULL,
  PRIMARY KEY USING BTREE (`idRol`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=4 AVG_ROW_LENGTH=5461 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `roltienepermiso` table : 
#

CREATE TABLE `roltienepermiso` (
  `idRol` INTEGER(11) NOT NULL,
  `idPermiso` INTEGER(11) NOT NULL,
  PRIMARY KEY USING BTREE (`idRol`, `idPermiso`) COMMENT '',
   INDEX `fk_rol_has_permiso_permiso1` USING BTREE (`idPermiso`) COMMENT '',
   INDEX `fk_rol_has_permiso_rol` USING BTREE (`idRol`) COMMENT '',
  CONSTRAINT `fk_rol_has_permiso_permiso1` FOREIGN KEY (`idPermiso`) REFERENCES `permiso` (`idPermiso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rol_has_permiso_rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AVG_ROW_LENGTH=5461 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `usuariodato` table : 
#

CREATE TABLE `usuariodato` (
  `idUsuarioDato` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` INTEGER(11) NOT NULL,
  `razonSocial` VARCHAR(45) COLLATE utf8_general_ci NOT NULL,
  `rfc` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `calle` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `noInterior` VARCHAR(11) COLLATE utf8_general_ci DEFAULT NULL,
  `noExterior` VARCHAR(11) COLLATE utf8_general_ci DEFAULT NULL,
  `cp` INTEGER(7) DEFAULT NULL,
  `municipio` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `estadoID` INTEGER(11) NOT NULL,
  `idPais` INTEGER(11) DEFAULT 147 COMMENT '147 = México',
  PRIMARY KEY USING BTREE (`idUsuarioDato`) COMMENT '',
   INDEX `adicional` USING BTREE (`idUsuario`) COMMENT '',
  CONSTRAINT `adicional` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=4 AVG_ROW_LENGTH=8192 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `ubicacionusuario` table : 
#

CREATE TABLE `ubicacionusuario` (
  `ubicacionUsuarioID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` INTEGER(1) NOT NULL,
  `latitud` VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
  `longitud` VARCHAR(20) COLLATE utf8_general_ci NOT NULL,
  `idUsuarioDato` INTEGER(11) NOT NULL,
  `estadoID` INTEGER(11) DEFAULT NULL,
  `zonageograficaID` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`ubicacionUsuarioID`, `idUsuarioDato`) COMMENT '',
   INDEX `ubicacionUsuario` USING BTREE (`idUsuarioDato`) COMMENT '',
  CONSTRAINT `ubicacionUsuario` FOREIGN KEY (`idUsuarioDato`) REFERENCES `usuariodato` (`idUsuarioDato`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `videos` table : 
#

CREATE TABLE `videos` (
  `link` TEXT COLLATE utf8_general_ci NOT NULL,
  `publicacionID` INTEGER(11) NOT NULL,
  `servicioID` INTEGER(11) NOT NULL,
  `detalleID` INTEGER(11) NOT NULL,
  `paqueteID` INTEGER(3) NOT NULL,
  PRIMARY KEY USING BTREE (`publicacionID`, `servicioID`, `detalleID`, `paqueteID`) COMMENT '',
  CONSTRAINT `publicacionVideo` FOREIGN KEY (`publicacionID`, `servicioID`, `detalleID`, `paqueteID`) REFERENCES `publicaciones` (`publicacionID`, `servicioID`, `detalleID`, `paqueteID`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `visita` table : 
#

CREATE TABLE `visita` (
  `idVisita` INTEGER(11) NOT NULL,
  `numeroVisitas` INTEGER(11) DEFAULT 0,
  PRIMARY KEY USING BTREE (`idVisita`) COMMENT ''
)ENGINE=InnoDB
AVG_ROW_LENGTH=16384 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `zonageografica` table : 
#

CREATE TABLE `zonageografica` (
  `zonaID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `zona` VARCHAR(60) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`zonaID`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=10 AVG_ROW_LENGTH=1820 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `zonageograficaestado` table : 
#

CREATE TABLE `zonageograficaestado` (
  `zonaID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(20) COLLATE utf8_general_ci NOT NULL,
  `estadoID` INTEGER(11) NOT NULL,
  `zonageograficaID` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`zonaID`, `estadoID`) COMMENT '',
   INDEX `zonageograficaID` USING BTREE (`zonageograficaID`) COMMENT '',
  CONSTRAINT `zonageograficaestado_fk1` FOREIGN KEY (`zonageograficaID`) REFERENCES `zonageografica` (`zonaID`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB
AUTO_INCREMENT=35 AVG_ROW_LENGTH=496 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Data for the `seccion` table  (LIMIT -484,500)
#

INSERT INTO `seccion` (`seccionID`, `seccionNombre`) VALUES

  (1,'Inicio'),
  (2,'Venta'),
  (3,'Cruza'),
  (4,'Directorio'),
  (5,'Perfil de usuario'),
  (6,'Adopción'),
  (7,'Perros Perdidos'),
  (8,'La raza del mes'),
  (9,'Evento del mes'),
  (10,'Datos Curiosos'),
  (11,'Asociaciones Protectoras'),
  (12,'¿Quiénes somos?'),
  (13,'Tutorial'),
  (14,'Publicidad'),
  (15,'Preguntas frecuentes');
COMMIT;

#
# Data for the `banner` table  (LIMIT -496,500)
#

INSERT INTO `banner` (`bannerID`, `imgbaner`, `texto`, `zonaID`, `posicion`, `seccionID`) VALUES

  (1,'banner_superior/_ff5c4__5edc3_Chrysanthemum_thumb.jpg','',9,1,1),
  (2,'/_35bf2__0aeae_Desert_thumb.jpg','meh',9,2,1),
  (3,'banner_inferior/_629ae__5e595_Hydrangeas_thumb.jpg','',9,3,1);
COMMIT;

#
# Data for the `usuario` table  (LIMIT -497,500)
#

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `telefono`, `correo`, `contrasena`, `recepcionCorreo`, `tipoUsuario`, `status`, `nivel`, `codigoConfirmacion`, `fechaRegistro`, `useragent`, `last_ip_access`, `authKey`, `paqueteGratis`) VALUES

  (2,'admin','admin',1111,'admin@gmail.com','2e0e4da5c11c0f8a73a01a5ddd672211af58c5b1e5179d7412',0,0,1,0,'B1E02B934AE20001B6BF05E8B','2014-07-14 21:23:15',NULL,NULL,'3825C3D57608E23507BB',1),
  (3,'martha','hdez',1111,'marthahdez2@gmail.com','67670d5c634e0ea54944b680c716149fbe9ae3bc1db24b313b',1,1,1,1,'0F718341B3A534B45BE9EB412','2014-07-17 17:24:18',NULL,NULL,'74034114067E4CDD92DA',1);
COMMIT;

#
# Data for the `catalogoproductos` table  (LIMIT -498,500)
#

INSERT INTO `catalogoproductos` (`productoID`, `nombre`, `descripcion`, `sku`, `precio`, `foto`) VALUES

  (1,'Shampoo para perro','Shampoo para perros chicos','aaa2222',80.00,NULL);
COMMIT;

#
# Data for the `ci_sessions` table  (LIMIT -498,500)
#

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES

  ('8eb1cd575c74373cee23ae3802b659ba','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36',1405660670,'a:13:{s:9:\"user_data\";s:0:\"\";s:6:\"logged\";b:1;s:9:\"idUsuario\";s:1:\"2\";s:6:\"correo\";s:15:\"admin@gmail.com\";s:6:\"nombre\";s:5:\"admin\";s:8:\"apellido\";s:5:\"admin\";s:11:\"tipoUsuario\";s:1:\"0\";s:7:\"authKey\";s:20:\"9CD68B40483F4DF699B3\";s:5:\"nivel\";s:1:\"0\";s:13:\"idUsuarioDato\";s:1:\"2\";s:3:\"rol\";i:0;s:14:\"manuallyLogged\";b:1;s:13:\"cart_contents\";a:4:{s:32:\"8790d0efe148fa886e517ab68e8d41e9\";a:7:{s:5:\"rowid\";s:32:\"8790d0efe148fa886e517ab68e8d41e9\";s:2:\"id\";s:1:\"1\";s:3:\"qty\";s:1:\"5\";s:5:\"price\";s:5:\"80.00\";s:4:\"name\";s:7:\"Shampoo\";s:7:\"options\";a:2:{s:4:\"Size\";s:5:\"Chica\";s:5:\"Color\";s:5:\"Verde\";}s:8:\"subtotal\";d:400;}s:32:\"5e33c2cbb670aa98581cdb7c7b7b4ebb\";a:7:{s:5:\"rowid\";s:32:\"5e33c2cbb670aa98581cdb7c7b7b4ebb\";s:2:\"id\";s:1:\"1\";s:3:\"qty\";s:1:\"5\";s:5:\"price\";s:5:\"80.00\";s:4:\"name\";s:7:\"Shampoo\";s:7:\"options\";a:2:{s:4:\"Size\";s:7:\"Mediana\";s:5:\"Color\";s:4:\"Azul\";}s:8:\"subtotal\";d:400;}s:11:\"total_items\";i:10;s:10:\"cart_total\";d:800;}}');
COMMIT;

#
# Data for the `paquete` table  (LIMIT -496,500)
#

INSERT INTO `paquete` (`paqueteID`, `nombrePaquete`) VALUES

  (1,'Lite'),
  (2,'Regular'),
  (3,'Premium');
COMMIT;

#
# Data for the `detallepaquete` table  (LIMIT -498,500)
#

INSERT INTO `detallepaquete` (`detalleID`, `cantFotos`, `caracteres`, `vigencia`, `cupones`, `videos`, `precio`, `paqueteID`) VALUES

  (1,1,50,30,0,0,59.00,1);
COMMIT;

#
# Data for the `serviciocontratado` table  (LIMIT -498,500)
#

INSERT INTO `serviciocontratado` (`servicioID`, `cantFotos`, `caracteres`, `vigencia`, `cupones`, `videos`, `precio`, `detalleID`, `paqueteID`, `idUsuario`) VALUES

  (1,1,50,30,0,0,0.00,1,1,2);
COMMIT;

#
# Data for the `estado` table  (LIMIT -466,500)
#

INSERT INTO `estado` (`estadoID`, `nombreEstado`) VALUES

  (1,'Aguascalientes'),
  (2,'Baja California'),
  (3,'Baja California Sur'),
  (4,'Campeche'),
  (5,'Chiapas'),
  (6,'Chihuahua'),
  (7,'Coahuila'),
  (8,'Colima'),
  (9,'Distrito Federal'),
  (10,'Durango'),
  (11,'Estado de México'),
  (12,'Guanajuato'),
  (13,'Guerrero'),
  (14,'Hidalgo'),
  (15,'Jalisco'),
  (16,'Michoacán'),
  (17,'Morelos'),
  (18,'Nayarit'),
  (19,'Nuevo León'),
  (20,'Oaxaca'),
  (21,'Puebla'),
  (22,'Querétaro'),
  (23,'Quintana Roo'),
  (24,'San Luis Potosí'),
  (25,'Sinaloa'),
  (26,'Sonora'),
  (27,'Tabasco'),
  (28,'Tamaulipas'),
  (29,'Tlaxcala'),
  (30,'Veracruz'),
  (31,'Yucatán'),
  (32,'Zacatecas'),
  (33,'Fuera de México');
COMMIT;

#
# Data for the `publicaciones` table  (LIMIT -498,500)
#

INSERT INTO `publicaciones` (`publicacionID`, `seccion`, `titulo`, `vigente`, `fechaCreacion`, `fechaVencimiento`, `numeroVisitas`, `estadoID`, `genero`, `razaID`, `precio`, `descripcion`, `muestraTelefono`, `aprobada`, `servicioID`, `detalleID`, `paqueteID`) VALUES

  (1,2,'Venta de Cachorro',1,'2014-07-16','2014-08-15',0,1,1,'1',999.99,'50 caracteres para anunciar',1,0,1,1,1);
COMMIT;

#
# Data for the `pais` table  (LIMIT -259,500)
#

INSERT INTO `pais` (`paisID`, `PAIS_ISONUM`, `PAIS_ISO2`, `PAIS_ISO3`, `nombrePais`) VALUES

  (1,4,'AF','AFG','Afganistán'),
  (2,248,'AX','ALA','Islas Gland'),
  (3,8,'AL','ALB','Albania'),
  (4,276,'DE','DEU','Alemania'),
  (5,20,'AD','AND','Andorra'),
  (6,24,'AO','AGO','Angola'),
  (7,660,'AI','AIA','Anguilla'),
  (8,10,'AQ','ATA','Antártida'),
  (9,28,'AG','ATG','Antigua y Barbuda'),
  (10,530,'AN','ANT','Antillas Holandesas'),
  (11,682,'SA','SAU','Arabia Saudí'),
  (12,12,'DZ','DZA','Argelia'),
  (13,32,'AR','ARG','Argentina'),
  (14,51,'AM','ARM','Armenia'),
  (15,533,'AW','ABW','Aruba'),
  (16,36,'AU','AUS','Australia'),
  (17,40,'AT','AUT','Austria'),
  (18,31,'AZ','AZE','Azerbaiyán'),
  (19,44,'BS','BHS','Bahamas'),
  (20,48,'BH','BHR','Bahréin'),
  (21,50,'BD','BGD','Bangladesh'),
  (22,52,'BB','BRB','Barbados'),
  (23,112,'BY','BLR','Bielorrusia'),
  (24,56,'BE','BEL','Bélgica'),
  (25,84,'BZ','BLZ','Belice'),
  (26,204,'BJ','BEN','Benin'),
  (27,60,'BM','BMU','Bermudas'),
  (28,64,'BT','BTN','Bhután'),
  (29,68,'BO','BOL','Bolivia'),
  (30,70,'BA','BIH','Bosnia y Herzegovina'),
  (31,72,'BW','BWA','Botsuana'),
  (32,74,'BV','BVT','Isla Bouvet'),
  (33,76,'BR','BRA','Brasil'),
  (34,96,'BN','BRN','Brunéi'),
  (35,100,'BG','BGR','Bulgaria'),
  (36,854,'BF','BFA','Burkina Faso'),
  (37,108,'BI','BDI','Burundi'),
  (38,132,'CV','CPV','Cabo Verde'),
  (39,136,'KY','CYM','Islas Caimán'),
  (40,116,'KH','KHM','Camboya'),
  (41,120,'CM','CMR','Camerún'),
  (42,124,'CA','CAN','Canadá'),
  (43,140,'CF','CAF','República Centroafricana'),
  (44,148,'TD','TCD','Chad'),
  (45,203,'CZ','CZE','República Checa'),
  (46,152,'CL','CHL','Chile'),
  (47,156,'CN','CHN','China'),
  (48,196,'CY','CYP','Chipre'),
  (49,162,'CX','CXR','Isla de Navidad'),
  (50,336,'VA','VAT','Ciudad del Vaticano'),
  (51,166,'CC','CCK','Islas Cocos'),
  (52,170,'CO','COL','Colombia'),
  (53,174,'KM','COM','Comoras'),
  (54,180,'CD','COD','República Democrática del Congo'),
  (55,178,'CG','COG','Congo'),
  (56,184,'CK','COK','Islas Cook'),
  (57,408,'KP','PRK','Corea del Norte'),
  (58,410,'KR','KOR','Corea del Sur'),
  (59,384,'CI','CIV','Costa de Marfil'),
  (60,188,'CR','CRI','Costa Rica'),
  (61,191,'HR','HRV','Croacia'),
  (62,192,'CU','CUB','Cuba'),
  (63,208,'DK','DNK','Dinamarca'),
  (64,212,'DM','DMA','Dominica'),
  (65,214,'DO','DOM','República Dominicana'),
  (66,218,'EC','ECU','Ecuador'),
  (67,818,'EG','EGY','Egipto'),
  (68,222,'SV','SLV','El Salvador'),
  (69,784,'AE','ARE','Emiratos Árabes Unidos'),
  (70,232,'ER','ERI','Eritrea'),
  (71,703,'SK','SVK','Eslovaquia'),
  (72,705,'SI','SVN','Eslovenia'),
  (73,724,'ES','ESP','España'),
  (74,581,'UM','UMI','Islas ultramarinas de Estados Unidos'),
  (75,840,'US','USA','Estados Unidos'),
  (76,233,'EE','EST','Estonia'),
  (77,231,'ET','ETH','Etiopía'),
  (78,234,'FO','FRO','Islas Feroe'),
  (79,608,'PH','PHL','Filipinas'),
  (80,246,'FI','FIN','Finlandia'),
  (81,242,'FJ','FJI','Fiyi'),
  (82,250,'FR','FRA','Francia'),
  (83,266,'GA','GAB','Gabón'),
  (84,270,'GM','GMB','Gambia'),
  (85,268,'GE','GEO','Georgia'),
  (86,239,'GS','SGS','Islas Georgias del Sur y Sandwich del Sur'),
  (87,288,'GH','GHA','Ghana'),
  (88,292,'GI','GIB','Gibraltar'),
  (89,308,'GD','GRD','Granada'),
  (90,300,'GR','GRC','Grecia'),
  (91,304,'GL','GRL','Groenlandia'),
  (92,312,'GP','GLP','Guadalupe'),
  (93,316,'GU','GUM','Guam'),
  (94,320,'GT','GTM','Guatemala'),
  (95,254,'GF','GUF','Guayana Francesa'),
  (96,324,'GN','GIN','Guinea'),
  (97,226,'GQ','GNQ','Guinea Ecuatorial'),
  (98,624,'GW','GNB','Guinea-Bissau'),
  (99,328,'GY','GUY','Guyana'),
  (100,332,'HT','HTI','Haití'),
  (101,334,'HM','HMD','Islas Heard y McDonald'),
  (102,340,'HN','HND','Honduras'),
  (103,344,'HK','HKG','Hong Kong'),
  (104,348,'HU','HUN','Hungría'),
  (105,356,'IN','IND','India'),
  (106,360,'ID','IDN','Indonesia'),
  (107,364,'IR','IRN','Irán'),
  (108,368,'IQ','IRQ','Iraq'),
  (109,372,'IE','IRL','Irlanda'),
  (110,352,'IS','ISL','Islandia'),
  (111,376,'IL','ISR','Israel'),
  (112,380,'IT','ITA','Italia'),
  (113,388,'JM','JAM','Jamaica'),
  (114,392,'JP','JPN','Japón'),
  (115,400,'JO','JOR','Jordania'),
  (116,398,'KZ','KAZ','Kazajstán'),
  (117,404,'KE','KEN','Kenia'),
  (118,417,'KG','KGZ','Kirguistán'),
  (119,296,'KI','KIR','Kiribati'),
  (120,414,'KW','KWT','Kuwait'),
  (121,418,'LA','LAO','Laos'),
  (122,426,'LS','LSO','Lesotho'),
  (123,428,'LV','LVA','Letonia'),
  (124,422,'LB','LBN','Líbano'),
  (125,430,'LR','LBR','Liberia'),
  (126,434,'LY','LBY','Libia'),
  (127,438,'LI','LIE','Liechtenstein'),
  (128,440,'LT','LTU','Lituania'),
  (129,442,'LU','LUX','Luxemburgo'),
  (130,446,'MO','MAC','Macao'),
  (131,807,'MK','MKD','ARY Macedonia'),
  (132,450,'MG','MDG','Madagascar'),
  (133,458,'MY','MYS','Malasia'),
  (134,454,'MW','MWI','Malawi'),
  (135,462,'MV','MDV','Maldivas'),
  (136,466,'ML','MLI','Malí'),
  (137,470,'MT','MLT','Malta'),
  (138,238,'FK','FLK','Islas Malvinas'),
  (139,580,'MP','MNP','Islas Marianas del Norte'),
  (140,504,'MA','MAR','Marruecos'),
  (141,584,'MH','MHL','Islas Marshall'),
  (142,474,'MQ','MTQ','Martinica'),
  (143,480,'MU','MUS','Mauricio'),
  (144,478,'MR','MRT','Mauritania'),
  (145,175,'YT','MYT','Mayotte'),
  (146,484,'MX','MEX','México'),
  (147,583,'FM','FSM','Micronesia'),
  (148,498,'MD','MDA','Moldavia'),
  (149,492,'MC','MCO','Mónaco'),
  (150,496,'MN','MNG','Mongolia'),
  (151,500,'MS','MSR','Montserrat'),
  (152,508,'MZ','MOZ','Mozambique'),
  (153,104,'MM','MMR','Myanmar'),
  (154,516,'NA','NAM','Namibia'),
  (155,520,'NR','NRU','Nauru'),
  (156,524,'NP','NPL','Nepal'),
  (157,558,'NI','NIC','Nicaragua'),
  (158,562,'NE','NER','Níger'),
  (159,566,'NG','NGA','Nigeria'),
  (160,570,'NU','NIU','Niue'),
  (161,574,'NF','NFK','Isla Norfolk'),
  (162,578,'NO','NOR','Noruega'),
  (163,540,'NC','NCL','Nueva Caledonia'),
  (164,554,'NZ','NZL','Nueva Zelanda'),
  (165,512,'OM','OMN','Omán'),
  (166,528,'NL','NLD','Países Bajos'),
  (167,586,'PK','PAK','Pakistán'),
  (168,585,'PW','PLW','Palau'),
  (169,275,'PS','PSE','Palestina'),
  (170,591,'PA','PAN','Panamá'),
  (171,598,'PG','PNG','Papúa Nueva Guinea'),
  (172,600,'PY','PRY','Paraguay'),
  (173,604,'PE','PER','Perú'),
  (174,612,'PN','PCN','Islas Pitcairn'),
  (175,258,'PF','PYF','Polinesia Francesa'),
  (176,616,'PL','POL','Polonia'),
  (177,620,'PT','PRT','Portugal'),
  (178,630,'PR','PRI','Puerto Rico'),
  (179,634,'QA','QAT','Qatar'),
  (180,826,'GB','GBR','Reino Unido'),
  (181,638,'RE','REU','Reunión'),
  (182,646,'RW','RWA','Ruanda'),
  (183,642,'RO','ROU','Rumania'),
  (184,643,'RU','RUS','Rusia'),
  (185,732,'EH','ESH','Sahara Occidental'),
  (186,90,'SB','SLB','Islas Salomón'),
  (187,882,'WS','WSM','Samoa'),
  (188,16,'AS','ASM','Samoa Americana'),
  (189,659,'KN','KNA','San Cristóbal y Nevis'),
  (190,674,'SM','SMR','San Marino'),
  (191,666,'PM','SPM','San Pedro y Miquelón'),
  (192,670,'VC','VCT','San Vicente y las Granadinas'),
  (193,654,'SH','SHN','Santa Helena'),
  (194,662,'LC','LCA','Santa Lucía'),
  (195,678,'ST','STP','Santo Tomé y Príncipe'),
  (196,686,'SN','SEN','Senegal'),
  (197,891,'CS','SCG','Serbia y Montenegro'),
  (198,690,'SC','SYC','Seychelles'),
  (199,694,'SL','SLE','Sierra Leona'),
  (200,702,'SG','SGP','Singapur'),
  (201,760,'SY','SYR','Siria'),
  (202,706,'SO','SOM','Somalia'),
  (203,144,'LK','LKA','Sri Lanka'),
  (204,748,'SZ','SWZ','Suazilandia'),
  (205,710,'ZA','ZAF','Sudáfrica'),
  (206,736,'SD','SDN','Sudán'),
  (207,752,'SE','SWE','Suecia'),
  (208,756,'CH','CHE','Suiza'),
  (209,740,'SR','SUR','Surinam'),
  (210,744,'SJ','SJM','Svalbard y Jan Mayen'),
  (211,764,'TH','THA','Tailandia'),
  (212,158,'TW','TWN','Taiwán'),
  (213,834,'TZ','TZA','Tanzania'),
  (214,762,'TJ','TJK','Tayikistán'),
  (215,86,'IO','IOT','Territorio Británico del Océano Índico'),
  (216,260,'TF','ATF','Territorios Australes Franceses'),
  (217,626,'TL','TLS','Timor Oriental'),
  (218,768,'TG','TGO','Togo'),
  (219,772,'TK','TKL','Tokelau'),
  (220,776,'TO','TON','Tonga'),
  (221,780,'TT','TTO','Trinidad y Tobago'),
  (222,788,'TN','TUN','Túnez'),
  (223,796,'TC','TCA','Islas Turcas y Caicos'),
  (224,795,'TM','TKM','Turkmenistán'),
  (225,792,'TR','TUR','Turquía'),
  (226,798,'TV','TUV','Tuvalu'),
  (227,804,'UA','UKR','Ucrania'),
  (228,800,'UG','UGA','Uganda'),
  (229,858,'UY','URY','Uruguay'),
  (230,860,'UZ','UZB','Uzbekistán'),
  (231,548,'VU','VUT','Vanuatu'),
  (232,862,'VE','VEN','Venezuela'),
  (233,704,'VN','VNM','Vietnam'),
  (234,92,'VG','VGB','Islas Vírgenes Británicas'),
  (235,850,'VI','VIR','Islas Vírgenes de los Estados Unidos'),
  (236,876,'WF','WLF','Wallis y Futuna'),
  (237,887,'YE','YEM','Yemen'),
  (238,262,'DJ','DJI','Yibuti'),
  (239,894,'ZM','ZMB','Zambia'),
  (240,716,'ZW','ZWE','Zimbabue');
COMMIT;

#
# Data for the `permiso` table  (LIMIT -495,500)
#

INSERT INTO `permiso` (`idPermiso`, `nivel`, `nombrePermiso`, `borrado`) VALUES

  (1,1,'Usuario Normal : Cuenta',0),
  (2,2,'Usuario Negocio: Cuenta Negocio',0),
  (3,3,'Usuario AC: Cuenta AC',0),
  (4,0,'Admin',0);
COMMIT;

#
# Data for the `rol` table  (LIMIT -496,500)
#

INSERT INTO `rol` (`idRol`, `nombreRol`, `borrado`) VALUES

  (1,'Usuario Normal',0),
  (2,'Usuario Negocio',0),
  (3,'Usuario AC',0);
COMMIT;

#
# Data for the `roltienepermiso` table  (LIMIT -496,500)
#

INSERT INTO `roltienepermiso` (`idRol`, `idPermiso`) VALUES

  (1,1),
  (2,2),
  (3,3);
COMMIT;

#
# Data for the `usuariodato` table  (LIMIT -497,500)
#

INSERT INTO `usuariodato` (`idUsuarioDato`, `idUsuario`, `razonSocial`, `rfc`, `calle`, `noInterior`, `noExterior`, `cp`, `municipio`, `estadoID`, `idPais`) VALUES

  (2,2,'','','','0','',0,'',0,147),
  (3,3,'','','','0','',0,'',0,147);
COMMIT;

#
# Data for the `visita` table  (LIMIT -498,500)
#

INSERT INTO `visita` (`idVisita`, `numeroVisitas`) VALUES

  (1,142);
COMMIT;

#
# Data for the `zonageografica` table  (LIMIT -490,500)
#

INSERT INTO `zonageografica` (`zonaID`, `zona`) VALUES

  (1,'Noroeste'),
  (2,'Noreste'),
  (3,'Occidente'),
  (4,'Centronorte'),
  (5,'Metropolitana'),
  (6,'Oriente'),
  (7,'Suroeste'),
  (8,'Sureste'),
  (9,'Todas');
COMMIT;

#
# Data for the `zonageograficaestado` table  (LIMIT -466,500)
#

INSERT INTO `zonageograficaestado` (`zonaID`, `nombre`, `estadoID`, `zonageograficaID`) VALUES

  (2,'Noroeste',2,1),
  (3,'Noroeste',3,1),
  (4,'Noroeste',26,1),
  (5,'Noroeste',25,1),
  (6,'Noroeste',6,1),
  (7,'Noroeste',10,1),
  (8,'Noreste',7,2),
  (9,'Noreste',19,2),
  (10,'Noreste',28,2),
  (11,'Occidente',15,3),
  (12,'Occidente',18,3),
  (13,'Occidente',8,3),
  (14,'Occidente',16,3),
  (15,'Centronorte',1,4),
  (16,'Centronorte',12,4),
  (17,'Centronorte',24,4),
  (18,'Centronorte',22,4),
  (19,'Centronorte',32,4),
  (20,'Metropolitana',11,5),
  (21,'Metropolitana',9,5),
  (22,'Metropolitana',17,5),
  (23,'Oriente',14,6),
  (24,'Oriente',21,6),
  (25,'Oriente',29,6),
  (26,'Oriente',30,6),
  (27,'Oriente',27,6),
  (28,'Suroeste',13,7),
  (29,'Suroeste',20,7),
  (30,'Suroeste',5,7),
  (31,'Sureste',4,8),
  (32,'Sureste',23,8),
  (33,'Sureste',31,8),
  (34,'Sureste',27,8);
COMMIT;

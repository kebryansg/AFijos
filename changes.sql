CREATE TABLE `tipomovimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) NOT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  `estado` varchar(3) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


CREATE TABLE `tipodocumento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) NOT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  `estado` varchar(3) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


alter table bodega add COLUMN idciudad int;
alter table bodega add FOREIGN KEY (idciudad) REFERENCES ciudad(id);


-- View ciudad
select `c`.*, `p`.`descripcion` AS `pais` 
from (`ciudad` `c` join `pais` `p` on((`c`.`idpais` = `p`.`id`))) where (`c`.`estado` = 'ACT') 


-- ========== 16/03/2018
CREATE TABLE `facturaOrdenCompra` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `codFactura` VARCHAR(255) NOT NULL,
    `fecha` datetime NOT NULL,
    `idproveedor` int(11) DEFAULT NULL,
    `estado` char(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idproveedor` (`idproveedor`),
  FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `detalleFacturaOrdenCompra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioCompra` decimal(12,2) NOT NULL,
  `idordencompra` int(11) DEFAULT NULL,
	`idfacturaordencompra` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idfacturaordencompra` (`idfacturaordencompra`),
  FOREIGN KEY (`idfacturaordencompra`) REFERENCES `facturaOrdenCompra` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE DEFINER=`root`@`localhost` PROCEDURE `ProveedorDetalleOrdenCompra`(IN `proveedor` int)
BEGIN
	/* Detalle de O. Compra que esta por facturar */
	SELECT dtoc.id,dtoc.descripcion, dtoc.precioCompra,(cantidad - cantFacturada) as saldo from detalleordencompra dtoc
	join ordencompra oc on oc.id = dtoc.idordencompra
	join proveedor pv on pv.id = oc.idproveedor
	where pv.id = proveedor and (cantidad - cantFacturada) > 0;

END


-- ============= 17/03/2018

CREATE TABLE `BodegaTipoMovimiento` (
  `idbodega` int(11) NOT NULL,
  `idtipomovimiento` int(11) NOT NULL,
  KEY `idbodega` (`idbodega`) USING BTREE,
  KEY `idtipomovimiento` (`idtipomovimiento`) USING BTREE,
  FOREIGN KEY (`idbodega`) REFERENCES `bodega` (`id`),
  FOREIGN KEY (`idtipomovimiento`) REFERENCES `tipomovimiento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;


alter table tipomovimiento add COLUMN tipo char(1);
update tipomovimiento set tipo = 'I';
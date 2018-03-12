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
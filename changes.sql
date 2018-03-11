-- Alter Table viewsubmodulo
select `sm`.`id` AS `id`,`sm`.`descripcion` AS `descripcion`,`sm`.`observacion` AS `observacion`,`sm`.`idmodulo` AS `idmodulo`,`sm`.`estado` AS `estado`,`sm`.`icon` AS `icon`,`sm`.`ruta` AS `ruta`,`m`.`descripcion` AS `modulo` from (`submodulo` `sm` join `modulo` `m` on((`m`.`id` = `sm`.`idmodulo`)));

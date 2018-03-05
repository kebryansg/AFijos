-- 02/03/2018
alter table modulo add COLUMN icon text;

-- 05/03/2018
/* Select Menú */
SELECT m.*, GROUP_CONCAT(sm.id) from modulo m
join submodulo sm on sm.idmodulo = m.id
join permisosubmodulo psm on psm.idsubmodulo = sm.id
join rol r on psm.idrol = r.id;

/* Alter viewsubmodulo */
select `sm`.`id` AS `id`,`sm`.`descripcion` AS `descripcion`,`sm`.`observacion` AS `observacion`,`sm`.`idmodulo` AS `idmodulo`,`sm`.`estado` AS `estado`,`m`.`descripcion` AS `modulo` from (`submodulo` `sm` join `modulo` `m` on((`m`.`id` = `sm`.`idmodulo`)));



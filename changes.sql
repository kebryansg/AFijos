-- 02/03/2018
alter table modulo add COLUMN icon text;

-- 05/03/2018
/* Select Menú */
SELECT m.*, GROUP_CONCAT(sm.id) from modulo m
join submodulo sm on sm.idmodulo = m.id
join permisosubmodulo psm on psm.idsubmodulo = sm.id
join rol r on psm.idrol = r.id;

/* Alter viewsubmodulo */
select `sm`.* ,`m`.`descripcion` AS `modulo` from (`submodulo` `sm` join `modulo` `m` on((`m`.`id` = `sm`.`idmodulo`)));

-- 06/03/2018
alter table submodulo add COLUMN icon text;
alter table submodulo add COLUMN ruta text;

update submodulo set icon = 'folder-open';


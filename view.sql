create view v_u_acceso_
as
SELECT
*
FROM t_usuario u  inner join t_sujeto s
on u.sident = s.identificadorsujeto;


create view v_u_permiso_
as
select * from t_pagina p
inner join t_permiso pe on
p.identificadorpag = pe.identpagina;

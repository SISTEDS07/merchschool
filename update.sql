create view t_entidad
as
SELECT _id_entidad identifadorentidad, _nombre nombreentidad, _razon_social razonsocialentidad, _ruc rucentidad, _logotipo_ lgoentidad, _estado estadoentidad
FROM _entidad;

create view t_tipopago
as
SELECT _id_tipo_pago identificadortipopago, _nombre_tp nombretipopago, _estado_tp estadotipopago FROM _tipo_pago;


create view t_gradoinstruccion
as
SELECT
_id_grado_instruccion identificadorgradoinst, _nombre_gi nombregradoinst, _estado_gi estadogradoinst
FROM _grado_instruccion;

create view t_curso
as
SELECT _id_curso identificadorcurso, _nombre_curs nombrecurso, _estado_curs estadocurso FROM _curso;

create view t_rol
as
SELECT
_id_rol identificadorrol, _descripcion_rol descripcionrol, _estado_rol estadorol
FROM _rol;

create view t_modalidadmatricula
as
SELECT
_id_modalidad_matricula identificadormodalidadmatr, _nombre_mod nombremodalidadmatr, _estado_mod estadomodalidadmatr
FROM _modalidad_matricula;

create view t_servicio
as
SELECT _id_servicio_educativo identificadorservicio, _nombre_se nombreservicio, _estado_se estadoservicio
FROM _servicio_educativo;

create view t_empresa
as
select
_id_empresa_private identifadorempr,
_servicio__id idservempr,
_logotipo_ logotipoemp,
_localizacion_main localizacionemp,
_direccion_main direccempr,
_telefono_1 telef001empr,
_telefono_2 telef002empr,
_celular_1 celularempr,
_razon_social razonscempr,
_ruc rucempr,
_dv dvempr,
_website sitiowebempr,
_codigo_postal codigopostempr,
_estado_ estadoempr,
_nombre_ nombreempr,
_n_sedes_ cantidadsedeempr,
_ced_ cedempr
from _empresa_private;


create view t_permiso
as
SELECT
_id_permiso identificadorperm,
_estado_permi estadoperm,
_fecha_registro fechaperm,
_pagina__id identpagina,
_usuario__id identuser
FROM _permiso;


create view t_pagina
as
SELECT
_id_pagina identificadorpag,
_controlador controladorpag,
_vista_titulo titulopag,
_vista_url vistapag,
_icono iconpag,
_estado_pagina estadopag
FROM _pagina;

create view t_sujeto
as
SELECT _id_sujeto identificadorsujeto,
 _numero_identi identidadsujeto,
 _apellid_patern apellidopaternosujeto,
 _apellid_matern apellidomaternosujeto,
 _nombre_s nombressujeto,
 _fullnom_bre datossujetos,
 _fecha_nacimiento fechanacimientosujeto,
 _sexo sexosujeto,
 _telefono telefonosujeto,
 _celular celularsujeto,
 _email emailsujeto,
 _website sitiowebsujeto,
 _edad edadsujeto,
 _nacionalidad paissujeto,
 _direccion domiciliosujeto,
 _estado_suj estadosujeto,
 _apoderado_responsable postestantesujeto,
 _distrito__id_distrito direccionlocalsujeto,
 _grado_instruccion__id gradoinstruccionsujeto,
 _empresa_private__id idtempresa FROM _sujeto;



 create view t_usuario
 as
 SELECT
 _id_usuario identificadoruser,
 _usuariocol nameuser,
 _passwocol claveuser,
 _perfil perfiluser,
 _estadouser estadouser,
 _rol__id roluser,
 _sujeto__id sident
  FROM _usuario;

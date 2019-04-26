<?php
/*
* SolicitudData.php
* Modelo de Base de datos para la tabla tsolviaticos del modulo solicitudes.
* @author Ing. Iván Hernández
* @date 2017-04-28
*/
class SolicitudData {
	
	public static $tablename = "tsolviaticos";

	public function SolicitudData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = date('Y-m-d');
		$this->fecha_vobo= date('Y-m-d H:i:s');
		$this->fecha_status= date('Y-m-d H:i:s');
		$this->fecha_pago= date('Y-m-d H:i:s');
		$this->credit_limit = "NULL";
		$this->id_status="3";
	}

//Función para insertar la solicitud en la tabla tsolviaticos
	public function add(){
		$sql = "insert into ".self::$tablename." (fecha_solic,gasolina_vales, gasolina_efectivo,alimentacion,hospedaje,casetas,concepto,objetivo,fecha_salida,fecha_retorno,lugar,id_usuario,id_status, fec_lim_comprob,solovales) ";
		$sql .= "value (\"$this->created_at\",\"$this->gasolina_vales\",\"$this->gasolina_efectivo\",\"$this->alimentos\",\"$this->hospedaje\",\"$this->casetas\",\"$this->datos\",\"$this->objetivo\",\"$this->fec_sal\",\"$this->fec_ret\",\"$this->lugar\",\"$this->comisionado\",$this->id_status,\"$this->fechalimite\",\"$this->solovales\")";
		Executor::doit($sql);
	}
	public function addRecibo(){
		$sql = "insert into recibos_pagos (rfc,nombre, correo, concepto,monto,fecha) ";
		$sql .= "value (\"$this->rfc\",\"$this->cliente\",\"$this->correo\",\"$this->concepto\",\"$this->monto\",\"$this->created_at\")";
		Executor::doit($sql);
	}

	public static function getByIdRecibo($id){
		$sql = "select *
				FROM recibos_pagos
				where folio=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SolicitudData());
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_solicitud=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}
	//Funcion para actualizar toda la solicitud
	public function update(){
		$sql = "update ".self::$tablename." 
				set code=\"$this->code\",name=\"$this->name\",email=\"$this->email\",
				address=\"$this->address\",lastname=\"$this->lastname\",phone=\"$this->phone\" 
				where id=$this->id";
		Executor::doit($sql);
	}
	//funcion para editar la solicitud cuando aun esta pendiente
	public function updateSolicPen(){
		$sql = "update ".self::$tablename." 
				set update_lastdate=\"$this->created_at\", concepto=\"$this->concepto\", objetivo=\"$this->objetivo\", lugar=\"$this->lugar\", 
				fecha_retorno=\"$this->fec_ret\", fecha_salida=\"$this->fec_sal\", alimentacion=\"$this->alimentacion\", hospedaje=\"$this->hospedaje\", 
				gasolina_vales=\"$this->gasolina_vales\", gasolina_efectivo=\"$this->gasolina_efectivo\",casetas=\"$this->casetas\",
				solovales=\"$this->solovales\", fec_lim_comprob=\"$this->fechalimite\"
				where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	//funcion para aprobar la solicitud
	public function updateSolic(){
		$sql = "update ".self::$tablename." 
				set id_status=\"$this->status\", 
				fecha_status=\"$this->fecha_status\", 
				observacion=\"$this->observacion\" where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	//funcion para aprobar la solicitud si es Admin y gerente
	public function updateSolicAdmin(){
		$sql = "update ".self::$tablename." 
				set id_status=\"$this->status\", fecha_status=\"$this->fecha_status\", 
				vobo=\"$this->vobo\", fecha_vobo=\"$this->fecha_vobo\" 
				where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	//Funcion para darle el visto bueno a la solicitud
	public function updateSolicVobo(){
		$sql = "update ".self::$tablename." 
				set vobo=\"$this->vobo\", 
				fecha_vobo=\"$this->fecha_vobo\" where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	//Funcion para aprobar el pago de la solicitud
	public function updateSolicPago(){
		$sql = "update ".self::$tablename." 
				set pagada=\"$this->pago\", 
				fecha_pago=\"$this->fecha_pago\" 
				where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}


	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	/*
	Update: Agregue (fecha_retorno-fecha_salida) as dias para poder obtener el numero de dias de
	comision
	by: Ing. Ivan Hernandez
	Fecha: 22/06/2017
	*/
	public static function getById($id){
		$sql = "select u.id,(fecha_retorno-fecha_salida) as dias,s.id_solicitud,d.name as depa,p.name as perfil,concat(ug.name,' ' ,ug.lastname) as jefe, ug.email as mail_jefe,fecha_solic,day(fecha_solic) as dia_solic, 
				month(fecha_solic) as mes_solic, year(fecha_solic) as anio_solic, u.name, u.lastname, u.cuenta, u.email, u.clabe_ban, 
				b.nombre, sum(gasolina_vales+gasolina_efectivo+alimentacion+hospedaje+casetas) as total_solic,sum(gasolina_efectivo+alimentacion+hospedaje+casetas) as total_efectivo, gasolina_vales, gasolina_efectivo,
				alimentacion,hospedaje, casetas,vobo, pagada, concepto, objetivo,fecha_salida,fecha_retorno, month(fecha_salida) as mes, 
				day(fecha_salida) as dia_salida, day(fecha_retorno) as dia_retorno, year(fecha_salida) as anio, lugar, id_status, observacion, c.alimentacion_c as a_c, c.casetas_c as c_c, c.hospedaje_c as h_c, c.gasolina_c as g_c,
				fecha_comprob, id_comprobacion
				FROM ".self::$tablename."  as s inner join tusuarios as u on s.id_usuario=u.id inner join tbancos as b on u.id_banco=b.id_banco 
				inner join tdepartamentos as d on u.id_departamento=d.id_departamento inner join tusuarios as ug on d.id_gerente=ug.id 
				inner join tusuarios_perfiles as up on u.id=up.id_usuario inner join tperfiles as p on up.id_perfil=p.id_perfil 
                left join tcomprobaciones as c on s.id_solicitud=c.id_solicitud
				where s.id_solicitud=$id 
				GROUP BY fecha_solic,concepto,objetivo, fecha_salida, fecha_retorno, lugar, id_status";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SolicitudData());
	}
	public static function getByIdComprob($id){
		$sql = "select pedido, comprobado, pedido - comprobado as diferencia, abs(pedido - comprobado) as positivo,
				case when (pedido - comprobado)<0 
				then 'A favor del Usuario' WHEN (pedido - comprobado)=0 then 'A favor de Nadie' 
				else 'A favor de la empresa' end as A_favor 
				from ( select sum(casetas + hospedaje + alimentacion + gasolina_efectivo) as pedido, 
				sum(c.casetas_c + c.alimentacion_c + c.hospedaje_c + c.gasolina_c) as comprobado 
				from ".self::$tablename." as s inner join tcomprobaciones as c on s.id_solicitud=c.id_solicitud
				where s.id_solicitud=$id ) as x";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SolicitudData());
	}
	public function updateComprobacion(){
		$sql = "update ".self::$tablename." 
				set comprobacion=1 
				where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	public static function getAllBySolic($id){
		$sql = "select * 
				FROM tcomprobantes
				where id_solicitud=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());
	}
	/*public static function getById($id){
		$sql = "select * 
				FROM ".self::$tablename." 
				where id_solicitud=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SolicitudData());
	}*/
	//Funcion para mostrar las solicitudes solamente del usuario logueado
	//Actualizacion: 2017-04-28 By Ing. Ivan
	public static function getAllByUser(){
		$sql = "select s.*, c.fecha_comprob from ".self::$tablename." as s left join tcomprobaciones as c
				on s.id_solicitud=c.id_solicitud
				where id_usuario= ".UserData::getById($_SESSION["user_id"])->id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
//Funcion para mostrar todas las solicitudes que existen 
		/*public static function getAll(){
		$sql = "select * from ".self::$tablename." as s inner join tusuarios as u on s.id_usuario=u.id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

*/	public static function getAll(){
		$sql = "select s.id_solicitud, fecha_solic,s.concepto, name,lastname, fecha_salida, 
		fecha_retorno,vobo, s.id_status,pagada,s.comprobacion, c.fecha_comprob, gasolina_efectivo, alimentacion,
		hospedaje, casetas, fecha_vobo, fecha_pago, fecha_status, solovales, u.id_departamento
		FROM tsolviaticos as s INNER JOIN tusuarios as u on s.id_usuario=u.id 
		left join tcomprobaciones as c on s.id_solicitud=c.id_solicitud"; 
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

}
public static function getAllAlumnos(){
	$sql = "select a.rgi, a.nombre, a.apellido,a.grado_cinta,a.fecha_ingreso,a.curp,a.correo,
					c.nombre as name, p.status, year(fecha_ingreso) as ingreso
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria left join plan_cuotas as p on p.id_alumno=a.id_alumno 
					where a.status=1 and a.clase=0
					GROUP BY a.rgi, a.nombre, a.apellido,a.grado_cinta,a.fecha_ingreso,a.curp,a.correo "; 
	$query = Executor::doit($sql);
	return Model::many($query[0],new SolicitudData());

}
public static function getCuotasVencidas(){
	$sql = "select p.id_alumno,a.rgi, concat(a.nombre,' ',a.apellido) as name, count(*) as cuotas, a.clase
					from plan_cuotas as p inner join alumnos as a on a.id_alumno=p.id_alumno 
					where p.status=2 and a.clase=0 and a.status=1 
					GROUP by p.id_alumno 
					order by 4 desc "; 
	$query = Executor::doit($sql);
	return Model::many($query[0],new SolicitudData());

}
public static function getAllAlumnosInactivos(){
	$sql = "select a.rgi, a.nombre, a.apellido,a.grado_cinta,a.fecha_ingreso,a.curp,a.correo, c.nombre as name, 
			a.fecha_baja, a.fecha_reingreso, ivan.last_date_assistance, a.motivo_baja
			from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria 
			inner join (select rgi, MAX(fecha) as last_date_assistance from asistencias where status in (1,2,0) GROUP by rgi ) as ivan on ivan.rgi=a.rgi 
			where a.status=0"; 
	$query = Executor::doit($sql);
	return Model::many($query[0],new SolicitudData());

}
	//Funcion para mostrar todas las solicitudes que estan aprobadas en perfil tesoreria
		public static function getAllAprobadas(){
		$sql = "select * from ".self::$tablename." as s inner join tusuarios as u on s.id_usuario=u.id 
			where (gasolina_efectivo<>0 or alimentacion<>0 or casetas<>0 or hospedaje<>0) and id_status=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
	//Funcion para mostrar todas las solicitudes que estan aprobadas en perfil tesoreria
	public static function getAllAprobadasAux(){
	$sql = "select s.id_solicitud, concat(u.name,' ', u.lastname) as nombre, s.fecha_solic, s.fecha_salida, 
			s.fecha_retorno, s.id_status, s.fecha_status, s.pagada, s.fecha_pago, c.fecha_comprob, s.solovales,
			s.comprobacion 
			from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id 
			left join tcomprobaciones as c on s.id_solicitud=c.id_solicitud 
			where solovales=0 and id_status=1 ";
	$query = Executor::doit($sql);
	return Model::many($query[0],new SolicitudData());

}
//funcion innecesaria xq pueden haber 2 juridicos y mostrarian las de ambos
	public static function getJuridico(){
		$sql = "select *
				from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id 
				inner join tusuarios_perfiles as up on u.id=up.id_usuario 
				left join tcomprobaciones as c on s.id_solicitud=c.id_solicitud 
				where up.id_perfil=9";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}

	public static function getByComprob(){
		$sql = "select * from ".self::$tablename." 
		where comprobacion=1 and id_usuario= ".UserData::getById($_SESSION["user_id"])->id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
//Funcion para mostrar todas las solicitudes con estado pendiente
	public static function getByStatus0(){
		$sql = "select * from ".self::$tablename." 
		where id_status=3 and id_usuario= ".UserData::getById($_SESSION["user_id"])->id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
//Funcion para mostrar todas las solicitudes con estado aprobado
		public static function getByStatus1(){
		$sql = "select * from ".self::$tablename." 
		where id_status=1 and id_usuario= ".UserData::getById($_SESSION["user_id"])->id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
//Funcion para mostrar todas las solicitudes de acuerdo al gerente del departamento asignado
	public static function getByGerente(){
		
		$sql= "select u.id,s.id_solicitud,s.gasolina_efectivo, s.gasolina_vales, s.alimentacion, s.casetas, 
			   s.hospedaje,u.id_departamento,u.name as name_u,lastname,fecha_solic,s.concepto, objetivo,
			   fecha_salida,fecha_retorno, vobo, pagada, id_status, fecha_vobo, fecha_pago, fecha_status, 
			   comprobacion, c.fecha_comprob, solovales
			   from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id 
			   inner join tdepartamentos as d on d.id_departamento=u.id_departamento 
			   left join tcomprobaciones as c on s.id_solicitud=c.id_solicitud 
			   where d.id_departamento=".UserData::getById($_SESSION["user_id"])->id_departamento." 
			   order by s.id_solicitud";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
	public static function getGroupByDate($start,$end){
  $sql = "select count(*) as s from ".self::$tablename." where date(fecha_solic) >= \"$start\" and date(fecha_solic) <= \"$end\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());
	}
	public static function getGroupByDateAsis($start,$end){
		$sql = "select count(*) as s from asistencias where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and status in (1,2)";
			  $query = Executor::doit($sql);
			  return Model::many($query[0],new SolicitudData());
		  }

	
}

?>
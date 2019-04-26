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
		$this->created_at = date('Y-m-d H:i:s');
		$this->fecha_vobo= date('Y-m-d H:i:s');
		$this->fecha_status= date('Y-m-d H:i:s');
		$this->fecha_pago= date('Y-m-d H:i:s');
		$this->credit_limit = "NULL";
		$this->id_status="3";
	}

//Función para insertar la solicitud en la tabla tsolviaticos
	public function add(){
		$sql = "insert into ".self::$tablename." (fecha_solic,gasolina_vales, gasolina_efectivo,alimentacion,hospedaje,casetas,concepto,objetivo,fecha_salida,fecha_retorno,lugar,id_usuario,id_status, fec_lim_comprob) ";
		$sql .= "value (\"$this->created_at\",\"$this->gasolina_vales\",\"$this->gasolina_efectivo\",\"$this->alimentos\",\"$this->hospedaje\",\"$this->casetas\",\"$this->datos\",\"$this->objetivo\",\"$this->fec_sal\",\"$this->fec_ret\",\"$this->lugar\",\"$this->comisionado\",$this->id_status,\"$this->fechalimite\")";
		Executor::doit($sql);

		
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
				set fecha_solic=\"$this->created_at\", concepto=\"$this->concepto\", objetivo=\"$this->objetivo\", lugar=\"$this->lugar\", 
				fecha_retorno=\"$this->fec_ret\", fecha_salida=\"$this->fec_sal\", alimentacion=\"$this->alimentacion\", hospedaje=\"$this->hospedaje\", 
				gasolina_vales=\"$this->gasolina_vales\", gasolina_efectivo=\"$this->gasolina_efectivo\",casetas=\"$this->casetas\" 
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
				fecha_pago=\"$this->fecha_pago\" where id_solicitud=$this->id_solicitud";
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
		$sql = "select (fecha_retorno-fecha_salida) as dias,id_solicitud,d.name as depa,p.name as perfil,concat(ug.name,' ' ,ug.lastname) as jefe, ug.email as mail_jefe,fecha_solic,day(fecha_solic) as dia_solic, 
				month(fecha_solic) as mes_solic, year(fecha_solic) as anio_solic, u.name, u.lastname, u.cuenta, u.email, u.clabe_ban, 
				b.nombre, sum(gasolina_vales+gasolina_efectivo+alimentacion+hospedaje+casetas) as total_solic,sum(gasolina_efectivo+alimentacion+hospedaje+casetas) as total_efectivo, gasolina_vales, gasolina_efectivo,
				alimentacion,hospedaje, casetas,vobo, pagada, concepto, objetivo,fecha_salida,fecha_retorno, month(fecha_salida) as mes, 
				day(fecha_salida) as dia_salida, day(fecha_retorno) as dia_retorno, year(fecha_salida) as anio, lugar, id_status, observacion
				FROM ".self::$tablename." as s inner join tusuarios as u on s.id_usuario=u.id inner join tbancos as b on u.id_banco=b.id_banco 
				inner join tdepartamentos as d on u.id_departamento=d.id_departamento inner join tusuarios as ug on d.id_gerente=ug.id 
				inner join tusuarios_perfiles as up on u.id=up.id_usuario inner join tperfiles as p on up.id_perfil=p.id_perfil 
				where id_solicitud=$id 
				GROUP BY fecha_solic,concepto,objetivo, fecha_salida, fecha_retorno, lugar, id_status";
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
		$sql = "select * from ".self::$tablename." 
				where id_usuario= ".UserData::getById($_SESSION["user_id"])->id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
//Funcion para mostrar todas las solicitudes que existen 
		public static function getAll(){
		$sql = "select * from ".self::$tablename." as s inner join tusuarios as u on s.id_usuario=u.id";
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
	public static function getJuridico(){
		$sql = "select * from ".self::$tablename." as s inner join tusuarios as u on s.id_usuario=u.id 
				inner join tusuarios_perfiles as up on u.id=up.id_usuario 
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
		$sql=  "select u.id,id_solicitud,s.gasolina_efectivo, s.gasolina_vales, s.alimentacion, s.casetas, 
				s.hospedaje,u.id_departamento,u.name as name_u,lastname,fecha_solic,s.concepto,
				objetivo,fecha_salida,fecha_retorno, vobo, pagada, id_status, fecha_vobo, fecha_pago, 
				fecha_status, comprobacion
				from ".self::$tablename." as s inner join tusuarios as u on s.id_usuario=u.id
				inner join tdepartamentos as d on d.id_departamento=u.id_departamento
				where d.id_departamento=".UserData::getById($_SESSION["user_id"])->id_departamento;
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

	
}

?>
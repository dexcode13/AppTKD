<?php
class ComprobantesData {
	public static $tablename = "tcomprobantes";


	public function ComprobantesData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
		$this->fec_comprobada = date('Y-m-d H:i:s');
		$this->fec_up = date('Y-m-d H:i:s');
	}

	public function add(){
		$sql = "insert into tcomprobantes (pdf,xml,descripcion,fecha_up,id_solicitud) ";
		$sql .= "value (\"$this->pdf\",\"$this->xml\",\"$this->descripcion\",\"$this->fec_up\",\"$this->id_solic\")";
		return Executor::doit($sql);
	}
	public function addVales(){
		$sql = "insert into tcomprobvales (vauche,descripcion,fecha_comprob,id_solicitud) ";
		$sql .= "value (\"$this->pdf\",\"$this->descripcion\",\"$this->fec_comprobada\",\"$this->id_solic\")";
		return Executor::doit($sql);
	}
	public function addComprobacion(){
		$sql = "insert into tcomprobaciones (id_solicitud,hospedaje_c,alimentacion_c,casetas_c,gasolina_c,fecha_comprob,total_comprob)";
		$sql .= "value (\"$this->id_solicitud\",\"$this->hospedaje\",\"$this->alimentacion\",\"$this->casetas\",\"$this->gasolina\",\"$this->fec_comprobada\",\"$this->total_comprob\")";
		return Executor::doit($sql);
	}

	public static function getAllBySolic($id){
		$sql = "select * 
				FROM ".self::$tablename."
				where id_solicitud=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ComprobantesData());
	}
	public static function getAllBySolicVales($id){
		$sql = "select * 
				FROM tcomprobvales
				where id_solicitud=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ComprobantesData());
	}
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto AnswerData previamente utilizamos el contexto
	public function updateComprobacion($id){
		$sql = "update tsolviaticos 
				set comprobacion=1 
				where id_solicitud=$id";
		Executor::doit($sql);
	}
	public static function getAllByUser(){
		$sql = "select s.*, c.fecha_comprob, v.fecha_comprob as fecha_vales
				from tsolviaticos as s left join tcomprobaciones as c
				on s.id_solicitud=c.id_solicitud
				left join tcomprobvales as v on s.id_solicitud=v.id_solicitud
				where id_status=1 and id_usuario= ".UserData::getById($_SESSION["user_id"])->id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ComprobantesData());

	}
	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AnswerData());
	}

	//Funcion para mostrar todas las solicitudes que existen 
		public static function getAll(){
		$sql = "select s.*, u.*, c.fecha_comprob
				from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id
				left join tcomprobaciones as c on c.id_solicitud=s.id_solicitud
				where s.id_status=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ComprobantesData());

	}
//Funcion para mostrar todas las solicitudes que existen 
		public static function getAllTesoreria(){
		$sql = "select s.*, u.*, c.fecha_comprob
				from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id
				left join tcomprobaciones as c on c.id_solicitud=s.id_solicitud
				where s.id_status=1 and s.solovales=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ComprobantesData());

	}


	public static function getJuridico(){
		$sql = "select * from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id 
				inner join tusuarios_perfiles as up on u.id=up.id_usuario 
				where up.id_perfil=9";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
	
	public static function getByGerente(){
		$sql=  "select u.id,id_solicitud,s.gasolina_efectivo, s.gasolina_vales, s.alimentacion, s.casetas, 
				s.hospedaje,u.id_departamento,u.name as name_u,lastname,fecha_solic,s.concepto,
				objetivo,fecha_salida,fecha_retorno, vobo, pagada, id_status, fecha_vobo, fecha_pago, 
				fecha_status 
				from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id
				inner join tdepartamentos as d on d.id_departamento=u.id_departamento
				where d.id_departamento=".UserData::getById($_SESSION["user_id"])->id_departamento;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}

	public static function getAllCorte($inicio, $fin){
		$sql = "SELECT id_solicitud, name, fecha_solic, monto_solicitado, comprobado, total_comprob, fecha_comprob, (
			monto_solicitado - total_comprob
			) AS diferencia
			FROM (
			
			SELECT s.id_solicitud,u.name, s.fecha_solic, sum( gasolina_efectivo + alimentacion + hospedaje + casetas ) AS monto_solicitado,
			CASE s.comprobacion
			WHEN 1
			THEN 'SI'
			WHEN 0
			THEN 'NO'
			END AS comprobado, c.total_comprob, s.fec_lim_comprob, c.fecha_comprob
			FROM tsolviaticos AS s
			INNER JOIN tusuarios AS u ON s.id_usuario = u.id
			LEFT JOIN tcomprobaciones AS c ON s.id_solicitud = c.id_solicitud
			WHERE fec_lim_comprob BETWEEN '".$inicio."' and '".$fin."'
			AND solovales =0
			AND id_status =1
			GROUP BY id_solicitud
			) AS ivan";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ComprobantesData());
	
	}


	//Funcion para mostrar todas las solicitudes que estan aprobadas en perfil tesoreria
		public static function getAllAprobadas(){
		$sql = "select * from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id 
			where (gasolina_efectivo<>0 or alimentacion<>0 or casetas<>0 or hospedaje<>0) and id_status=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
	public static function getAllByTicketId($id){
		$sql = "select * from ".self::$tablename." where ticket_id=".$id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new AnswerData());

	}
	

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AnswerData());
	}


}

?>
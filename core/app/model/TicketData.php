<!--
Desarrollado por: Ing. Iván Hernández
Fecha: 26/04/2017
Función: Clase para las funciones de insertar, eliminar, actualizar y buscar en el modulo de Tickets, todo 
se lleva a cabo por medio de funciones
-->
<?php
class TicketData {
	public static $tablename = "ticket";


	public function TicketData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getProject(){ return ProveedorData::getById($this->id_proveedor); }
	public function getPriority(){ return PriorityData::getById($this->id_priority); }
	public function getStatus(){ return DepartamentoData::getById($this->id_departamento); }
	public function getKind(){ return KindData::getById($this->id_kind); }
	public function getCategory(){ return PerfilData::getById($this->id_perfil); }

	public function add(){
		$sql = "insert into ticket (title,description,category_id,project_id,priority_id,user_id,status_id,kind_id,person_id,asigned_id,file,created_at) ";
		$sql .= "value (\"$this->title\",\"$this->description\",\"$this->category_id\",\"$this->project_id\",$this->priority_id,$this->user_id,$this->status_id,$this->kind_id,$this->person_id,$this->asigned_id,\"$this->file\",$this->created_at)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto TicketData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",category_id=\"$this->category_id\",project_id=\"$this->project_id\",priority_id=\"$this->priority_id\",description=\"$this->description\",status_id=\"$this->status_id\",kind_id=\"$this->kind_id\",updated_at=NOW(),person_id=$this->person_id,asigned_id=$this->asigned_id where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TicketData());
	}

	public static function getRepeated($pacient_id,$medic_id,$date_at,$time_at){
		$sql = "select * from ".self::$tablename." where pacient_id=$pacient_id and medic_id=$medic_id and date_at=\"$date_at\" and time_at=\"$time_at\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TicketData());
	}



	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where mail=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TicketData());
	}

	public static function getEvery(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}

	public static function getAllByStatus($s){
		$sql = "select * from ".self::$tablename." where id_departamento=$s order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}


	public static function getAllPendings(){
		$sql = "select * from ".self::$tablename." where id_departamento=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}


	public static function getAllByPacientId($id){
		$sql = "select * from ".self::$tablename." where pacient_id=$id order by created_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}

	public static function getAllByMedicId($id){
		$sql = "select * from ".self::$tablename." where medic_id=$id order by created_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}

	public static function getOld(){
		$sql = "select * from ".self::$tablename." where date(date_at)<date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}
	public static function getGroupByDate($start,$end){
  $sql = "select count(*) as s from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TicketData());
	}


}

?>
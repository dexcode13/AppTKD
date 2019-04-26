<!--
Desarrollado por: Ing. Iván Hernández
Fecha: 26/04/2017
Función: Clase para las funciones de insertar, eliminar, actualizar y buscar en el modulo de Perfiles, todo 
se lleva a cabo por medio de funciones
-->
<?php
class PerfilData {
	public static $tablename = "tperfiles";

	public function PerfilData(){
		$this->name = "";
		$this->diasmax = "";
		$this->is_active="1";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into tperfiles (name,diasmax,montomax,is_active,fecha_registro) ";
		$sql .= "value (\"$this->name\",\"$this->diasmax\",\"$this->montomax\",$this->is_active,$this->created_at)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_perfil=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_perfil=$this->id_perfil";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto PerfilData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." 
		set name=\"$this->name\", diasmax=\"$this->diasmax\", montomax=\"$this->montomax\", is_active=$this->is_active 
		where id_perfil=$this->id_perfil";
		Executor::doit($sql);
	}
	public function updateAsig(){
		$sql = "update tusuarios_perfiles 
				set id_perfil=$this->id_perfil
				where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_perfil=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PerfilData());
	}

	public static function getByIdAsig($id){
		$sql = "select u.id,concat(u.name,' ',u.lastname) as usuario, p.name as perfil, p.id_perfil as id_p
				from tusuarios as u inner join tusuarios_perfiles as up on u.id=up.id_usuario 
				inner join ".self::$tablename." as p on p.id_perfil=up.id_perfil 
				where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PerfilData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where is_active=1" ;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PerfilData());

	}

	public static function getPerfil(){
		$sql = "select * from ".self::$tablename." where id_perfil= ".UserData::getById($_SESSION["user_id"])->id_perfil;
		$query = Executor::doit($sql);
		return Model::one($query[0],new PerfilData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PerfilData());
	}


}

?>
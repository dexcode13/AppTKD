<!--
Desarrollado por: Ing. Iván Hernández
Fecha: 26/04/2017
Función: Clase para las funciones de insertar, eliminar, actualizar y buscar en el modulo de Perfiles, todo 
se lleva a cabo por medio de funciones
-->
<?php
class BancoData {
	public static $tablename = "tbancos";


	public function BancoData(){
		/*$this->name = "";
		$this->diasmax = "";*/
		$this->status="1";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into tbancos (nombre,razon_social,status)";
		$sql .= "value (\"$this->name\",\"$this->razon\",$this->status)";
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
		$sql = "update ".self::$tablename." set nombre=\"$this->name\", razon_social=\"$this->razon\", status=$this->is_active where id_banco=$this->id_banco";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_banco=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BancoData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where status=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BancoData());

	}

	public static function Cuentas(){
		$sql = "select u.cuenta, u.clabe_ban, b.nombre, u.name, u.lastname, u.email from ".self::$tablename." as b inner join tusuarios as u on b.id_banco=u.id_banco";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BancoData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PerfilData());
	}


}

?>
<?php
/*
* PersonData.php
* Modelo de Base de datos para la tabla person del modulo lb-person.
* @author evilnapsis
* @date 2016-11-11
*/
class PersonData {
	public static $tablename = "person";

	public function PersonData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
		$this->credit_limit = "NULL";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (code,name,lastname,address,email,phone,created_at) ";
		$sql .= "value (\"$this->code\",\"$this->name\",\"$this->lastname\",\"$this->address\",\"$this->email\",\"$this->phone\",$this->created_at)";
		Executor::doit($sql);
	}


	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set code=\"$this->code\",name=\"$this->name\",email=\"$this->email\",address=\"$this->address\",lastname=\"$this->lastname\",phone=\"$this->phone\" where id=$this->id";
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


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PersonData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());

	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());

	}


}

?>
<!--
Desarrollado por: Ing. Iván Hernández
Fecha: 26/04/2017
Función: Clase para las funciones de insertar, eliminar, actualizar y buscar en el modulo de Departamentos, todo 
se lleva a cabo por medio de funciones
-->
<?php
class DepartamentoData {
	public static $tablename = "tdepartamentos";


	public function DepartamentoData(){
		/*$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";*/
		$this->is_active = "1";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into tdepartamentos (name, descripcion, is_active) ";
		$sql .= "value (\"$this->name\",\"$this->descripcion\", $this->is_active)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_departamento=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_departamento=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto DepartamentoData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." 
				set name=\"$this->name\", descripcion=\"$this->descripcion\", 
				is_active=$this->is_active, id_gerente=\"$this->gerente\"
				where id_departamento=$this->id_departamento";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select d.*, concat(u.name,' ',u.lastname) as nombre from ".self::$tablename." 
				as d inner join tusuarios as u on d.id_gerente=u.id
				where d.id_departamento=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new DepartamentoData());
	}

	public static function getAll(){
		$sql = "select d.*, concat(u.name,' ',u.lastname) as nombre from ".self::$tablename." 
				as d inner join tusuarios as u on d.id_gerente=u.id
				where d.is_active=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DepartamentoData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DepartamentoData());
	}


}

?>
<!--
Desarrollado por: Ing. Iván Hernández
Fecha: 26/04/2017
Función: Clase para las funciones de insertar, eliminar, actualizar y buscar en el modulo de usuarios, todo 
se lleva a cabo por medio de funciones
-->
<?php
class UserData {
	public static $tablename = "tusuarios";
	

	public function UserData(){
		/*$this->email = "";
		$this->kind = "";
		$this->banco = "";
		$this->cuenta = "";
		$this->fec_nac = "";
		$this->id_perfil = "";
		$this->id_departamento = "";*/
		$this->name = "";
		$this->lastname = "";
		$this->username = "";
		$this->password = "";
		$this->is_active = "1";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,lastname,email,username,password,is_active,created_at,id_departamento, id_tipo,id_banco, cuenta, fecha_nac) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->username\",\"$this->password\",$this->is_active,$this->created_at,$this->id_departamento,$this->id_tipo,\"$this->id_banco\",\"$this->cuenta\",\"$this->fecha_nac\")";
		/*$sql = "insert into ".self::$tablename." (name,lastname,email,username,password,is_active,kind,created_at, banco, cuenta, fecha_nac,id_perfi, id_departamento) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->username\",\"$this->password\",$this->is_active,$this->kind,$this->created_at,\"$this->banco\",\"$this->cuenta\",\"$this->fec_nac\",\"$this->id_perfil\",\"$this->id_departamento\")";
		*/
		//$id_u = mysql_insert_id($sql);
		Executor::doit($sql);
	}

	public function asignarPerfil(){
		$sql = "insert into tusuarios_perfiles (id_usuario, id_perfil) ";
		$sql .= "value (\"$this->usuario\",\"$this->perfil\")";
		Executor::doit($sql);
	}
	public function UpdatePermiso(){
		$sql = "update tperfiles_modulos 
				set consultar=$this->consultar,
				agregar=$this->agregar, 
				editar=$this->editar, 
				eliminar= $this->eliminar
				where id_perfil=$this->id_perfil and id_modulo=$this->id_modulo";
		Executor::doit($sql);
	}

	public function asignarPermiso(){
		$sql = "insert into tperfiles_modulos (consultar, agregar, editar, eliminar, id_modulo, id_perfil) ";
		$sql .= "value ($this->consultar,$this->agregar,$this->editar,$this->eliminar,$this->id_modulo,$this->id_perfil)";
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

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set id_banco=\"$this->id_banco\",cuenta=\"$this->cuenta\",fecha_nac=\"$this->fecha_nac\",name=\"$this->name\",email=\"$this->email\",lastname=\"$this->lastname\",username=\"$this->username\",is_active=$this->is_active,id_tipo=$this->id_tipo where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}
//funcion para buscar los tipos de usuarios que exiten y esten activos
	public static function getByType(){
		$sql = "select * from ttipousuarios where status=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getById($id){
		$sql = "select u.*, up.*,concat(us.name,' ',us.lastname) as gerente,us.email as mail_gerente,
				b.nombre
				from tusuarios as u inner join tusuarios_perfiles as up on u.id=up.id_usuario 
				inner join tdepartamentos as d on u.id_departamento=d.id_departamento 
				inner join tusuarios as us on us.id=d.id_gerente
				inner join tbancos as b on u.id_banco=b.id_banco 
				where u.id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}
//Funcion para buscar el perfil de acuerdo al id del usuario logueado
	public static function getByCargo(){
		$sql = "select * from ".self::$tablename." as u inner join tusuarios_perfiles as up on u.id=up.id_usuario
		inner join tperfiles as p on up.id_perfil=p.id_perfil  where u.id=".UserData::getById($_SESSION["user_id"])->id;
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
//Funcion para buscar usuario perteneciente al perfil de gerente, quienes son los unicos que puede autorizar solicitudes
	public static function getByIdPerfil(){
		$sql = "select * from ".self::$tablename." as u inner join tusuarios_perfiles as up 
		on u.id=up.id_usuario
		where id_perfil=2 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getPerfiles(){
		$sql = "select up.id_perfil,u.id,concat(u.name,' ',u.lastname) as nombre, p.name as perfil 
				from tusuarios as u inner join tusuarios_perfiles as up on u.id=up.id_usuario 
				inner join tperfiles as p on up.id_perfil=p.id_perfil order by u.lastname";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	public static function Modulos(){
		$sql = "select pm.id_modulo, pm.id_perfil, m.nombre, consultar,agregar, editar, eliminar 
				from tmodulos as m inner join tperfiles_modulos as pm 
				on m.id_modulo=pm.id_modulo 
				where id_perfil=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


}

?>
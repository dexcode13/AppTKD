<!--
Desarrollado por: Ing. Iván Hernández
Fecha: 26/04/2017
Función: Clase para las funciones de insertar, eliminar, actualizar y buscar en el modulo de Perfiles, todo 
se lleva a cabo por medio de funciones
-->
<?php
class ReportesData {
	public static $tablename = "tsolviaticos";


	public function ReportesData(){
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

	public static function SolicitudesPagadas(){
		$sql = "select id_solicitud, concat(u.name,' ', u.lastname) as nombre, sum(gasolina_efectivo + alimentacion + casetas + hospedaje)as monto, 
				concepto, fecha_salida, fecha_retorno, fecha_pago from ".self::$tablename." as s inner join tusuarios as u 
				on s.id_usuario=u.id 
				where pagada=1 
				GROUP by id_solicitud,concepto, fecha_salida, fecha_retorno";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReportesData());

	}
	public static function RecibosGenerados(){
		$sql = "select *
				from recibos_pagos";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReportesData());

	}

	public static function Vales(){
		$sql = "select id_solicitud, concat(u.name,' ', u.lastname) as nombre, gasolina_vales as monto, concepto, fecha_salida, 
				fecha_retorno from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id where solovales=1 
				GROUP by id_solicitud,concepto, fecha_salida, fecha_retorno";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReportesData());

	}

	public static function Comprobaciones(){
		$sql = "select s.id_solicitud, concat(u.name,' ',u.lastname) as nombre,s.concepto, s.gasolina_efectivo, s.alimentacion, 
				s.casetas, s.hospedaje, sum(s.gasolina_efectivo + s.alimentacion + s.casetas + s.hospedaje) as total_solicitado, 
				c.gasolina_c,c.alimentacion_c,c.casetas_c,c.hospedaje_c, SUM(c.hospedaje_c + c.alimentacion_c + c.casetas_c + 
				c.gasolina_c) as total from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id 
				inner join tcomprobaciones as c on s.id_solicitud=c.id_solicitud 
				group by s.id_solicitud ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReportesData());

	}

	public static function Solicitudes(){
		$sql = "select id_solicitud, concat(u.name,' ', u.lastname) as nombre, gasolina_vales as vales, sum(alimentacion + casetas + hospedaje + gasolina_efectivo) 
		as efectivo, concepto, fecha_salida, fecha_retorno, 
		case id_status when '1' then 'Autorizada' 
					   when '2' then 'Cancelada' 
					   WHEN '3' then 'Pendiente' end as status, fecha_status 
		from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id 
		GROUP by id_solicitud,concepto, fecha_salida, fecha_retorno";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReportesData());

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
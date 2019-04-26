<?php
/*
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Clase creada para la conexion con la base de datos y el sistema
*/
class Database {
	public static $db;
	public static $con;
	function Database(){
		$this->user="root";
		$this->pass="";
		$this->host="localhost";
		$this->ddbb="produccion_eric";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>

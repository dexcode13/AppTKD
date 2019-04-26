<?php
/*
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Clase para ejecutar la sentencias SQL que se hacen en todo el proyecto
*/
class Executor {

	public static function doit($sql){
		$con = Database::getCon();
		if(Core::$debug_sql){
			print "<pre>".$sql."</pre>";
		}
		return array($con->query($sql),$con->insert_id);
	}
}
?>
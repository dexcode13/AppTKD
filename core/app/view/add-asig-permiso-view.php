<?php
/**
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Por medio de este archivo se pasan las variables del formulario para proceder hacer el registro en la tabla,
*creando un objeto de la clase y mandando a llamar la funcion de agregar para el registro
**/

if(count($_POST)>0){
	$user = new UserData();
	$user->id_perfil = $_POST["id_perfil"];
	$user->id_modulo = $_POST["id_modulo"];
	$user->consultar=(isset($_POST['consultar'])) ? 1 : 0;
	$user->agregar=(isset($_POST['agregar'])) ? 1 : 0;
	$user->editar=(isset($_POST['editar'])) ? 1 : 0;
	$user->eliminar=(isset($_POST['eliminar'])) ? 1 : 0;
	/*for ($i=0;$i<10;$i++)
	{
		$user->asignarPermiso();
	}*/
	$user->asignarPermiso();


print "<script>window.location='index.php?view=users';</script>";
}
?>
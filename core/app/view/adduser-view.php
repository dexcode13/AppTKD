<?php
/**
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Por medio de este archivo se pasan las variables del formulario para proceder hacer el registro en la tabla,
*creando un objeto de la clase y mandando a llamar la funcion de agregar para el registro
**/

if(count($_POST)>0){
	$user = new UserData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->id_tipo = $_POST["tipo"];
	$user->password = sha1(md5($_POST["password"]));
	$user->id_banco = $_POST["banco"];
	$user->cuenta = $_POST["cuenta"];
	//$user->clabe = $_POST["clabe"];
	$user->fecha_nac = $_POST["fec_nac"];
	//$user->id_perfil = $_POST["perfil"];
	$user->id_departamento = $_POST["departamento"];
	$user->add();
	print "<script>window.location='index.php?view=users';</script>";
}

?>

<!--<div class="alert alert-success">
    <strong>¡Usuario Registrado satisfactoriamente!</strong>  <a href="index.php?view=users" class="alert-link">Regresar al Módulo Usuarios</a>.
  </div>-->

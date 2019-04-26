<?php
/**
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Por medio de este archivo se pasan las variables del formulario para proceder hacer el registro en la tabla,
*creando un objeto de la clase y mandando a llamar la funcion de agregar para el registro
**/

if(count($_POST)>0){
	$user = new UserData();
	$user->usuario = $_POST["usuario"];
	$user->perfil = $_POST["perfil"];
	$user->asignarPerfil();

print "<script>window.location='index.php?view=asig_perfiles';</script>";
}
?>
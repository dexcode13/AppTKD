<?php
/**
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Por medio de este archivo se pasan las variablas del formulario para proceder hacer el registro en la tabla,
*creando un objeto de la clase y mandando a llamar la funcion de agregar para el registro
**/

if(count($_POST)>0){
	$user = new BancoData();
	$user->name = $_POST["name"];
	$user->razon = $_POST["razon"];;
	$user->add();

print "<script>window.location='index.php?view=bancos';</script>";


}


?>
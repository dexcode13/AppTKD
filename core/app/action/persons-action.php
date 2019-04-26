<?php 
/*
* Archivo persons-action.php
* Contiene las acciones de agregar personas, actualizar persona y eliminar persona.
* @author evilnapsis
* @date 2016-11-11
*/
if(isset($_GET["op"]) && $_GET["op"]=="add"){
	$user = new PersonData();
	$user->code = "";
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->add();
	Core::redir("./?view=persons&op=all");
}
else if(isset($_GET["op"]) && $_GET["op"]=="update"){
	$user = PersonData::getById($_POST["id"]);
	$user->code = "";
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->update();
	Core::redir("./?view=persons&op=all");
}
else if(isset($_GET["op"]) && $_GET["op"]=="del"){
	$client = PersonData::getById($_GET["id"]);
	$client->del();
	Core::redir("./?view=persons&op=all");
}
?>
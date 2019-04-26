<?php
/**
* BookMedik
* @author evilnapsis
* @url http://evilnapsis.com/about/
**/

if(count($_POST)>0){
	$user = TicketData::getById($_POST["id"]);
	$user->title = $_POST["title"];
	$user->category_id = $_POST["category_id"];
	$user->project_id = $_POST["project_id"];
	$user->priority_id = $_POST["priority_id"];
	$user->description = $_POST["description"];

	$user->person_id = $_POST["person_id"]!=""?$_POST["person_id"]:"NULL";
	$user->asigned_id = $_POST["asigned_id"]!=""?$_POST["asigned_id"]:"NULL";


	$user->status_id = $_POST["status_id"];
	$user->kind_id = $_POST["kind_id"];

	$user->update();

Core::alert("Actualizado exitosamente!");
Core::redir("./index.php?view=tickets&status=$_POST[status_id]");
//print "<script>window.location='index.php?view=tickets';</script>";


}


?>
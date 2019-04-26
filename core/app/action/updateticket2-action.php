<?php
/**
* BookMedik
* @author evilnapsis
* @url http://evilnapsis.com/about/
**/

if(count($_POST)>0){
	$user = TicketData::getById($_POST["id"]);
	$user->priority_id = $_POST["priority_id"];

	$user->person_id = $_POST["person_id"]!=""?$_POST["person_id"]:"NULL";
	$user->asigned_id = $_POST["asigned_id"]!=""?$_POST["asigned_id"]:"NULL";


	$user->status_id = $_POST["status_id"];
	$user->kind_id = $_POST["kind_id"];

	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=openticket&id=$_POST[id]';</script>";


}


?>
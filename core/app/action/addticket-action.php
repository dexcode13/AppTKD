<?php
/**
* BookMedik
* @author evilnapsis
**/


$r = new TicketData();
$r->title = $_POST["title"];
$r->description = $_POST["description"];
$r->category_id = $_POST["category_id"];
$r->project_id = $_POST["project_id"];
$r->priority_id = $_POST["priority_id"];
$r->user_id = $_SESSION["user_id"];

$r->person_id = $_POST["person_id"]!=""?$_POST["person_id"]:"NULL";
$r->asigned_id = $_POST["asigned_id"]!=""?$_POST["asigned_id"]:"NULL";

$r->status_id = $_POST["status_id"];
$r->kind_id = $_POST["kind_id"];

$f = new Upload($_FILES["file"]);
if($f->uploaded){
	$f->Process("storage/tickets/");
	if($f->processed){
		$r->file = $f->file_dst_name;
	}
}

$r->add();

Core::alert("Agregado exitosamente!");
Core::redir("./index.php?view=tickets&status=$_POST[status_id]");
?>
<?php
/**
* BookMedik
* @author evilnapsis
**/


$r = new AnswerData();
$r->description = $_POST["description"];

$f = new Upload($_FILES["file"]);
if($f->uploaded){
	$f->Process("storage/tickets/$_POST[id]/");
	if($f->processed){
		$r->file = $f->file_dst_name;
	}
}

$r->ticket_id = $_POST["id"];
$r->user_id = $_SESSION["user_id"];
$r->tipo = $_POST["tipo"];


$r->add();

Core::alert("Agregado exitosamente!");
Core::redir("./index.php?view=openticket&id=$_POST[id]");
?>
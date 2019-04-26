<?php
/**
* BookMedik
* @author evilnapsis
**/


$r = new ComprobantesData();
$r->descripcion = $_POST["description"];
$r->id_solic = $_POST["id"];

$f = new Upload($_FILES["pdf"]);
if($f->uploaded){
	$f->Process("storage/comprobantes/$_POST[id]/");
	if($f->processed){
		$r->pdf = $f->file_dst_name;
	}
}
$x = new Upload($_FILES["xml"]);
if($x->uploaded){
	$x->Process("storage/comprobantes/$_POST[id]/");
	if($x->processed){
		$r->xml = $x->file_dst_name;
	}
}

/*$r->ticket_id = $_POST["id"];
$r->user_id = $_SESSION["user_id"];
$r->tipo = $_POST["tipo"];*/


$r->add();

Core::alert("Comprobantes Agregado");
Core::redir("./index.php?view=opencomprob&id=$_POST[id]");
?>
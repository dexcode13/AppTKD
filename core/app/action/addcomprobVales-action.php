<?php
/**
* Archivo para agregar los comprobantes de vauches sobre los vales
* @author Ing. Ivan Hernandez
**/

$solic= SolicitudData::getById($_POST["id"]);
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

/*$r->ticket_id = $_POST["id"];
$r->user_id = $_SESSION["user_id"];
$r->tipo = $_POST["tipo"];*/


$r->addVales();
$solic->updateComprobacion();

Core::alert("Comprobante Agregado");
Core::redir("./index.php?view=opencomprobVales&id=$_POST[id]");
?>
<?php

if(isset($_SESSION["user_id"])){
	Core::$user = UserData::getById($_SESSION["user_id"]);
}
/// en caso de que el parametro action este definido evitamos que se muestre
/// el layout por defecto y ejecutamos el action sin mostrar nada de vista
// print_r($_GET);
if(!isset($_GET["action"])){
	//Bootload::load("default");
	Module::loadLayout("index");
}else{
	//Module::loadLayout("index");
	Action::load($_GET["action"]);
}

?>
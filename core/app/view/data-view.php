<?php
if (isset($_GET["id"])){
    include ("../model/AlumnosData.php");
    include ("../../controller/Executor.php");
    include ("../../controller/Database.php");
    include ("../../controller/Core.php");
    include ("../../controller/Model.php");
    $j = AlumnosData::getByJustificaciones($_GET["id"]);
    echo $j->observacion;
}
?>
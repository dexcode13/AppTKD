<?php

$perfil = PerfilData::getById($_GET["id"]);

$perfil->del();
Core::redir("./index.php?view=perfiles");


?>
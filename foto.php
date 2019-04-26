<?php
$file ='_assets/img/alumnos/1102.png';
$directory ='_assets/img/alumnos/';

// Devuelve true
$exists = is_file( $file );
// Devuelve false
$exists = is_file( $directory );
//echo $exists;

// Devuelve true
$exists = file_exists( $file );
if ($exists) {
    echo "Si existe";
} else {
    echo "No existe";
}

// Devuelve TRUE
$exists = file_exists( $directory );
?>
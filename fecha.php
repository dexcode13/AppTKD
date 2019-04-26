  <?php
    /*                               h.m.s.mes.dia.año*/   
    /*$salida           = '2017-08-08'; 
    $fechaInicial = strtotime($salida); 
    $lapso          = 5; //  dias habiles  
    $diasTrans      = 0; // dias transcurridos  
    $diasHabiles    = 0;  
    $feriados       = array("15-8","19-4","1-5","18-5","02-11","25-12");  
    while($diasHabiles<($lapso+1))  
    {   $fecha      = $fechaInicial+($diasTrans*86400);   
        $diaSemana  = getdate($fecha);  
        if($diaSemana["wday"]!=0 && $diaSemana["wday"]!=6)  
        {   $feriado    = $diaSemana['mday']."-".$diaSemana['mon'];  
            if(!in_array($feriado,$feriados))  
            {   $diasHabiles++; }  
        }  
        $diasTrans++;  
    }  
    $fechaFinal     = $fechaInicial+(($diasTrans-1)*86400);   
    echo "<br /><br /><b>Entrega:".date("Y-m-d",$fechaFinal)."</b>"; */
    /*$host = "localhost";
    $username = "root";
    $password = "";
    $dbName = "app_academiatkd";
    $pathToBackupDirectory = "c:";
    $project = "backup_academiatkd";
    $backup_file = "$pathToBackupDirectory/$project-" . date("Y-m-d-H-i-s") . ".sql.gz";
    $command = "mysqldump --opt -h $host -u $username -p $password $dbName | gzip > $backup_file";
    system($command,$output);*/
    $db_host = 'localhost'; //Host del Servidor MySQL
	$db_name = 'app_academiatkd'; //Nombre de la Base de datos
	$db_user = 'root'; //Usuario de MySQL
	$db_pass = ''; //Password de Usuario MySQL
	
	$fecha = date("Ymd-His"); //Obtenemos la fecha y hora para identificar el respaldo
 
	// Construimos el nombre de archivo SQL Ejemplo: mibase_20170101-081120.sql
	$salida_sql = $db_name.'_'.$fecha.'.sql'; 
	
	//Comando para genera respaldo de MySQL, enviamos las variales de conexion y el destino
	$dump = "C:\xampp\mysql\bin\mysqldump --host $db_host --user $db_user --password $db_pass --opt $db_name > $salida_sql";
	system($dump, $output); //Ejecutamos el comando para respaldo
	
	$zip = new ZipArchive(); //Objeto de Libreria ZipArchive
	
	//Construimos el nombre del archivo ZIP Ejemplo: mibase_20160101-081120.zip
	$salida_zip = $db_name.'_'.$fecha.'.zip';
	
	if($zip->open($salida_zip,ZIPARCHIVE::CREATE)===true) { //Creamos y abrimos el archivo ZIP
		$zip->addFile($salida_sql); //Agregamos el archivo SQL a ZIP
		$zip->close(); //Cerramos el ZIP
		unlink($salida_sql); //Eliminamos el archivo temporal SQL
		header ("Location: $salida_zip"); // Redireccionamos para descargar el Arcivo ZIP
		} else {
		echo 'Error'; //Enviamos el mensaje de error
	}
    
    ?> 
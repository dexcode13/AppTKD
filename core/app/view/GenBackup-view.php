<?php
/**
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Por medio de este archivo se pasan las variables del formulario para proceder hacer el registro en la tabla,
*creando un objeto de la clase y mandando a llamar la funcion de agregar para el registro
**/
$host="localhost";
$username="root";
$password="";
$database_name="produccion_eric";

$conn=mysqli_connect($host,$username,$password,$database_name);

$tables=array();
$sql="SHOW TABLES";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_row($result)){
$tables[]=$row[0];
}

$backupSQL="";
    foreach($tables as $table){
        $query="SHOW CREATE TABLE $table";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_row($result);
        $backupSQL.="\n\n".$row[1].";\n\n";
        
        $query="SELECT * FROM $table";
        $result=mysqli_query($conn,$query);
        
        $columnCount=mysqli_num_fields($result);
        
        for($i=0;$i<$columnCount;$i++){
            while($row=mysqli_fetch_row($result)){
                $backupSQL.="INSERT INTO $table VALUES(";
                for($j=0;$j<$columnCount;$j++){
                    $row[$j]=$row[$j];
                    
                    if(isset($row[$j])){
                            $backupSQL.='"'.$row[$j].'"';
                        }
                    else
                        {
                            $backupSQL.='""';
                        }
                    if($j<($columnCount-1)){
                        $backupSQL.=',';
                    }
                }
                $backupSQL.=");\n";
            }
        }
        $backupSQL.="\n";
}

if(!empty($backupSQL)){
    
    $dir = "backups/";
    $backup_file_name=$database_name.'_backup_'.time().'.sql';
    $fileHandler=fopen($dir.$backup_file_name,'w+');
    $number_of_lines=fwrite($fileHandler,$backupSQL);
    
    fclose($fileHandler);
    
    
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($backup_file_name));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: '.filesize($backup_file_name));
    //ob_clean();
    //flush();
    readfile($backup_file_name);
		//echo "Base de datos : ".$database_name.", guardada";
		//Core::alert("Plan Generado Satisfactorimante en dia $dia y mes $mes");
		//print "<script>window.location='index.php?view=backup';</script>";
}
	
		$plan = new AlumnosData();
		$plan->nombre = $backup_file_name;
		$plan->ruta = "backups/$backup_file_name";

		$plan->addBackup();
		

?>
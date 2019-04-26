<?php 
/*
* Archivo solicitudes-action.php
* Contiene las acciones de agregar solicitudes, actualizar persona y eliminar persona.
* @author Ing. Iván Hernández
* @date 2017-04-27
*/
if(count($_POST)>0){

			$alumno = new AlumnosData();
			$alumno->rgi = $_POST["rgi"];	
			$alumno->categoria = $_POST["categoria"];		
			$alumno->nombre = $_POST["nombre"];
			$alumno->apellido = $_POST["apellido"];
			$alumno->edad = $_POST["edad"];
			$alumno->fecha_nac = $_POST["fecha_nac"];
			$alumno->direccion = $_POST["direccion"];
			$alumno->colonia = $_POST["colonia"];
			$alumno->cp = $_POST["cp"];
			$alumno->curp = $_POST["curp"];
			$alumno->telefono = $_POST["telefono"];

		
			$f = new Upload($_FILES["foto"]);
			if($f->uploaded){
				$f->file_new_name_body = $_POST["rgi"];
				$f->file_new_name_ext = 'png';
				//$perfil = $f->file_new_name_body;
				$f->Process("_assets/img/alumnos/");
				if($f->processed){
					$alumno->foto = "_assets/img/alumnos/".$_POST['rgi'].".png";
				}
			}
			else{
				$alumno->foto = "_assets/img/alumnos/".$_POST['rgi'].".png";
			}
			$a = $alumno->addGim();
			//print_r($alumno);
			$tutor = new AlumnosData();
			$tutor->id_alumno = $a[1];
			$tutor->nombre_padre = $_POST["nombre_padre"];
            $tutor->tel_padre = $_POST["tel_padre"];
            $tutor->trabajo_padre = $_POST["trabajo_padre"];
            $tutor->nombre_madre = $_POST["nombre_madre"];
            $tutor->tel_madre = $_POST["tel_madre"];
			$tutor->trabajo_madre = $_POST["trabajo_madre"];
			$tutor->addTutores();
			$plan = new AlumnosData();
			
			if(isset($_POST["agregarplan"]))
			{
				$plan->alumno = $a[1];
				$plan->cuota=date('m');
				$plan->ciclo=date('Y');
				$mes = date('m');
				$anio = date('Y');
				$ven = $anio."-".$mes."-05";
				//corregir bug sobre fecha permanente, debe ser la fecha vencimiento del plan actual
				$plan->vencimiento = $ven;
				$plan->prueba();
			}

			Core::alert("Alumno de Gimnasia registrado satisfactoriamente, podrá checar hasta mañana");	
			print "<script>window.location='index.php?view=alumnosGim';</script>";			

}
?>
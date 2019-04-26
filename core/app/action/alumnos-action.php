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
			//$full_name  = strip_tags($_POST['nombre']);
			$alumno->categoria = $_POST["categoria"];
			$alumno->nombre = $_POST["nombre"];
			$alumno->apellido = $_POST["apellido"];
			$alumno->telefono = $_POST["telefono"];
			$alumno->edad = $_POST["edad"];
			$alumno->problema_f_m = $_POST["problema_f_m"];
			//$alumno->grado_cinta = $_POST["grado_cinta"];
			//$alumno->clase = $_POST["clase"];
            $alumno->correo = $_POST["correo"];
			$alumno->direccion = $_POST["direccion"];
			$alumno->colonia = $_POST["colonia"];
			$alumno->cp = $_POST["cp"];
			$alumno->fec_nac = $_POST["fec_nac"];
			$alumno->curp = $_POST["curp"];
			$alumno->nivel_esc = $_POST["nivel_esc"];
            $alumno->tipo_sangre = $_POST["tipo_sangre"];
			/*$f = new Upload($_FILES["foto"]);
			if($f->uploaded){
				$f->Process("storage/fotos/$_POST[rgi]/");
				if($f->processed){
					$alumno->foto = $f->file_dst_name;
				}
			}*/
			$f = new Upload($_FILES["foto"]);
			if($f->uploaded){
				$f->file_new_name_body = $_POST["rgi"];
				//$perfil = $f->file_new_name_body;
				$f->Process("_assets/img/alumnos/");
				if($f->processed){
					$alumno->foto = "_assets/img/alumnos/".$_POST['rgi'].".png";
				}
			}
			else{
				$alumno->foto = "_assets/img/alumnos/".$_POST['rgi'].".png";
			}
			$a = $alumno->add();
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
			
			if(isset($_POST["agregarplan"]) && isset($_POST["anualidad"]))
			{
				$plan->alumno = $a[1];
				$plan->cuota=date('m');
				$plan->ciclo=date('Y');
				//corregir bug sobre fecha permanente, debe ser la fecha vencimiento del plan actual
				$mes = date('m');
				$anio = date('Y');
				$ven = $anio."-".$mes."-05";
				$plan->vencimiento = $ven;
				$plan->prueba();
				$plan->rgi = $_POST["rgi"];
				$plan->year = $anio;
				$plan->vencimiento = "2019-01-15";
				$plan->Anualidad();

			}
			Core::alert("Alumno registrado satisfactoriamente, podrá checar hasta mañana");	
			print "<script>window.location='index.php?view=alumnos&op=all';</script>";			

}
?>
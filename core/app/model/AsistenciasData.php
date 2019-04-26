<?php
/*
* SolicitudData.php
* Modelo de Base de datos para la tabla tsolviaticos del modulo solicitudes.
* @author Ing. Iván Hernández
* @date 2017-04-28
*/
class AsistenciasData {
	
	public static $tablename = "asistencias";

	public function AsistenciasData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = date('Y-m-d');
		$this->fecha_vobo= date('Y-m-d H:i:s');
		$this->fecha_status= date('Y-m-d H:i:s');
		$this->fecha_pago= date('Y-m-d H:i:s');
		$this->credit_limit = "NULL";
		$this->grado="12";
		$this->hoy = date('Y-m-d');
	}

//Función para insertar la solicitud en la tabla alumnos
	public function add(){
		$sql = "insert into ".self::$tablename." (rgi, id_categoria, nombre, apellidos,telefono, foto, fecha_ingreso, grado, fec_nac, tipo_sangre,curp,domicilio,colonia, cp,correo, nivel_estudio) ";
		$sql .= "value (\"$this->rgi\",\"$this->categoria\",\"$this->nombre\",\"$this->apellido\",\"$this->telefono\",\"$this->foto\",\"$this->created_at\",\"$this->grado\",\"$this->fec_nac\",\"$this->tipo_sangre\",\"$this->curp\",\"$this->direccion\",\"$this->colonia\",\"$this->cp\",\"$this->correo\",\"$this->nivel_esc\")";
		Executor::doit($sql);
    }
    public function addTutores(){
		$sql = "insert into tutores (rgi,nombre_padre, cel_padre, trabajo_padre, nombre_madre, cel_madre, trabajo_madre) ";
		$sql .= "value (\"$this->rgi\",\"$this->nombre_padre\",\"$this->tel_padre\",\"$this->trabajo_padre\",\"$this->nombre_madre\",\"$this->tel_madre\",\"$this->trabajo_madre\")";
		Executor::doit($sql);
	}
	public function addRecibo(){
		$sql = "insert into recibos_pagos (rfc,nombre, correo, concepto,monto,fecha) ";
		$sql .= "value (\"$this->rfc\",\"$this->cliente\",\"$this->correo\",\"$this->concepto\",\"$this->monto\",\"$this->created_at\")";
		Executor::doit($sql);
	}
	public function addPagoMes(){
		$sql = "insert into pagos (rgi,concepto, monto, fecha_pago) ";
		$sql .= "value (\"$this->rgi\",\"MENSUALIDAD $this->concepto\",\"$this->monto\",\"$this->fecha_pago\")";
		Executor::doit($sql);
	}

	/*public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_solicitud=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}
	//Funcion para actualizar toda la solicitud
	public function update(){
		$sql = "update ".self::$tablename." 
				set code=\"$this->code\",name=\"$this->name\",email=\"$this->email\",
				address=\"$this->address\",lastname=\"$this->lastname\",phone=\"$this->phone\" 
				where id=$this->id";
		Executor::doit($sql);
	}
	//funcion para editar la solicitud cuando aun esta pendiente
	public function updateSolicPen(){
		$sql = "update ".self::$tablename." 
				set update_lastdate=\"$this->created_at\", concepto=\"$this->concepto\", objetivo=\"$this->objetivo\", lugar=\"$this->lugar\", 
				fecha_retorno=\"$this->fec_ret\", fecha_salida=\"$this->fec_sal\", alimentacion=\"$this->alimentacion\", hospedaje=\"$this->hospedaje\", 
				gasolina_vales=\"$this->gasolina_vales\", gasolina_efectivo=\"$this->gasolina_efectivo\",casetas=\"$this->casetas\",
				solovales=\"$this->solovales\", fec_lim_comprob=\"$this->fechalimite\"
				where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	//funcion para aprobar la solicitud
	public function updateSolic(){
		$sql = "update ".self::$tablename." 
				set id_status=\"$this->status\", 
				fecha_status=\"$this->fecha_status\", 
				observacion=\"$this->observacion\" where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	//funcion para aprobar la solicitud si es Admin y gerente
	public function updateSolicAdmin(){
		$sql = "update ".self::$tablename." 
				set id_status=\"$this->status\", fecha_status=\"$this->fecha_status\", 
				vobo=\"$this->vobo\", fecha_vobo=\"$this->fecha_vobo\" 
				where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	//Funcion para darle el visto bueno a la solicitud
	public function updateSolicVobo(){
		$sql = "update ".self::$tablename." 
				set vobo=\"$this->vobo\", 
				fecha_vobo=\"$this->fecha_vobo\" where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	//Funcion para aprobar el pago de la solicitud
	public function updateSolicPago(){
		$sql = "update ".self::$tablename." 
				set pagada=\"$this->pago\", 
				fecha_pago=\"$this->fecha_pago\" where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}


	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}*/

	/*
	Update: Agregue (fecha_retorno-fecha_salida) as dias para poder obtener el numero de dias de
	comision
	by: Ing. Ivan Hernandez
	Fecha: 22/06/2017
	*/
	/*public static function getById($id){
		$sql = "select u.id,(fecha_retorno-fecha_salida) as dias,s.id_solicitud,d.name as depa,p.name as perfil,concat(ug.name,' ' ,ug.lastname) as jefe, ug.email as mail_jefe,fecha_solic,day(fecha_solic) as dia_solic, 
				month(fecha_solic) as mes_solic, year(fecha_solic) as anio_solic, u.name, u.lastname, u.cuenta, u.email, u.clabe_ban, 
				b.nombre, sum(gasolina_vales+gasolina_efectivo+alimentacion+hospedaje+casetas) as total_solic,sum(gasolina_efectivo+alimentacion+hospedaje+casetas) as total_efectivo, gasolina_vales, gasolina_efectivo,
				alimentacion,hospedaje, casetas,vobo, pagada, concepto, objetivo,fecha_salida,fecha_retorno, month(fecha_salida) as mes, 
				day(fecha_salida) as dia_salida, day(fecha_retorno) as dia_retorno, year(fecha_salida) as anio, lugar, id_status, observacion, c.alimentacion_c as a_c, c.casetas_c as c_c, c.hospedaje_c as h_c, c.gasolina_c as g_c,
				fecha_comprob, id_comprobacion
				FROM ".self::$tablename."  as s inner join tusuarios as u on s.id_usuario=u.id inner join tbancos as b on u.id_banco=b.id_banco 
				inner join tdepartamentos as d on u.id_departamento=d.id_departamento inner join tusuarios as ug on d.id_gerente=ug.id 
				inner join tusuarios_perfiles as up on u.id=up.id_usuario inner join tperfiles as p on up.id_perfil=p.id_perfil 
                left join tcomprobaciones as c on s.id_solicitud=c.id_solicitud
				where s.id_solicitud=$id 
				GROUP BY fecha_solic,concepto,objetivo, fecha_salida, fecha_retorno, lugar, id_status";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SolicitudData());
	}
	public static function getByIdComprob($id){
		$sql = "select pedido, comprobado, pedido - comprobado as diferencia, abs(pedido - comprobado) as positivo,
				case when (pedido - comprobado)<0 
				then 'A favor del Usuario' WHEN (pedido - comprobado)=0 then 'A favor de Nadie' 
				else 'A favor de la empresa' end as A_favor 
				from ( select sum(casetas + hospedaje + alimentacion + gasolina_efectivo) as pedido, 
				sum(c.casetas_c + c.alimentacion_c + c.hospedaje_c + c.gasolina_c) as comprobado 
				from ".self::$tablename." as s inner join tcomprobaciones as c on s.id_solicitud=c.id_solicitud
				where s.id_solicitud=$id ) as x";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SolicitudData());
	}
	public function updateComprobacion(){
		$sql = "update ".self::$tablename." 
				set comprobacion=1 
				where id_solicitud=$this->id_solicitud";
		Executor::doit($sql);
	}
	public static function getAllBySolic($id){
		$sql = "select * 
				FROM tcomprobantes
				where id_solicitud=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());
    }*/
    
	/*public static function getById($id){
		$sql = "select * 
				FROM ".self::$tablename." 
				where id_solicitud=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SolicitudData());
	}*/
	//Funcion para mostrar las solicitudes solamente del usuario logueado
	//Actualizacion: 2017-04-28 By Ing. Ivan
	/*public static function getAllByUser(){
		$sql = "select s.*, c.fecha_comprob from ".self::$tablename." as s left join tcomprobaciones as c
				on s.id_solicitud=c.id_solicitud
				where id_usuario= ".UserData::getById($_SESSION["user_id"])->id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}*/
//Funcion para mostrar todas las solicitudes que existen 
		/*public static function getAll(){
		$sql = "select * from ".self::$tablename." as s inner join tusuarios as u on s.id_usuario=u.id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

*/	
/*public static function getAll(){
		$sql = "select s.id_solicitud, fecha_solic,s.concepto, name,lastname, fecha_salida, 
		fecha_retorno,vobo, s.id_status,pagada,s.comprobacion, c.fecha_comprob, gasolina_efectivo, alimentacion,
		hospedaje, casetas, fecha_vobo, fecha_pago, fecha_status, solovales, u.id_departamento
		FROM tsolviaticos as s INNER JOIN tusuarios as u on s.id_usuario=u.id 
		left join tcomprobaciones as c on s.id_solicitud=c.id_solicitud"; 
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

}*/
		public static function getAllAlumnos(){
			$sql = "select a.*, c.name
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());

		}
		public static function getPagos(){
			$sql = "select concat(a.nombre,' ',a.apellidos) as alumno, p.concepto, a.rgi,p.monto, p.fecha_pago,
					(case when id_pago is null then 'pendiente' else 'pagado' end) as pago 
					from alumnos as a left join pagos as p on a.rgi=p.rgi"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());

		}
		public static function getByAlumno($id){
			$sql = "select a.*,t.nombre_padre, t.cel_padre, t.trabajo_padre,t.nombre_madre, t.cel_madre, t.trabajo_madre
					from alumnos as a inner join tutores as t on a.rgi=t.rgi
					where a.rgi=$id"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AsistenciasData());
		}
		public static function getByAlumAsistencia($id){
			$sql = "select a.nombre, a.apellido, a.id_categoria, aa.fecha, time_format(aa.hora_entrada,'%r') as hora, aa.status, aa.id_asistencia
					from alumnos as a inner join asistencias as aa on a.id_alumno=aa.id_alumno
					where aa.rgi=$id"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
		}
		public static function getByIDAsistencia($id){
			$sql = "select observacion from asistencias as a inner join justificaciones as j on a.id_alumno=j.id_alumno and a.fecha=j.fecha_justificada 
					where a.id_asistencia=$id"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AsistenciasData());
		}
		public static function getAllAsistencias(){
			$sql = "select a.id_alumno, a.rgi,a.fecha, time_format (a.hora_entrada,'%r') as hora, a.status,concat(al.nombre,' ',al.apellido) as alumno 
					FROM asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno ";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
		}
		public static function getAllByDateOfficial($start,$end, $dias){
			$sql = "SELECT al.rgi, al.nombre, al.apellido, count(a.status) AS total, count(a.status)*100/\"$dias\"  as porcentaje 
					FROM asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno 
					WHERE a.status=1 and fecha>=\"$start\" and fecha<=\"$end\" and DAYOFWEEK(fecha)<>7
					GROUP by a.rgi";
				   if($start == $end){
					$sql = "SELECT al.rgi, al.nombre, al.apellido, count(a.status) AS total, count(a.status)*100/\"$dias\"  as porcentaje 
					FROM asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno 
					WHERE a.status=1 and fecha=\"$start\" and DAYOFWEEK(fecha)<>7 
					GROUP by a.rgi";
				   }
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
				 }
				 /*Modifique la funcion para que tome 30 dias como un 100% para el calculo de asistencias y ya no sobre el total de clases de acuerdo al rango de fechas
				 (SELECT count(*) as dias FROM (SELECT fecha from asistencias WHERE fecha BETWEEN \"$start\" and \"$end\" GROUP by fecha) as i)*/
		public static function getByBetaTKD($start,$end){
			$sql = "SELECT al.rgi, al.nombre, al.apellido, count(a.status) AS total, count(a.status)*100/30 as porcentaje
					FROM asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno 
					WHERE a.status in(1,2) and fecha>=\"$start\" and fecha<=\"$end\" and al.clase=0 
					GROUP by a.rgi";
				   if($start == $end){
					$sql = "SELECT al.rgi, al.nombre, al.apellido, count(a.status) AS total, count(a.status)*100/(SELECT count(*) as dias FROM (SELECT fecha from asistencias WHERE fecha BETWEEN \"$start\" and \"$end\" GROUP by fecha) as i) as porcentaje 
					FROM asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno 
					WHERE a.status in (1,2) and fecha=\"$start\" and al.clase=0
					GROUP by a.rgi";
				   }
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
			   }
			   public static function getByBetaGIM($start,$end){
				$sql = "SELECT al.rgi, al.nombre, al.apellido, count(a.status) AS total, count(a.status)*100/(SELECT count(*) as dias FROM (SELECT fecha from asistencias WHERE fecha BETWEEN \"$start\" and \"$end\" GROUP by fecha) as i) as porcentaje
						FROM asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno 
						WHERE a.status in(1,2) and fecha>=\"$start\" and fecha<=\"$end\" and al.clase=1 
						GROUP by a.rgi";
					   if($start == $end){
						$sql = "SELECT al.rgi, al.nombre, al.apellido, count(a.status) AS total, count(a.status)*100/(SELECT count(*) as dias FROM (SELECT fecha from asistencias WHERE fecha BETWEEN \"$start\" and \"$end\" GROUP by fecha) as i) as porcentaje 
						FROM asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno 
						WHERE a.status in (1,2) and fecha=\"$start\" and al.clase=1
						GROUP by a.rgi";
					   }
				$query = Executor::doit($sql);
				return Model::many($query[0],new AsistenciasData());
				   }

		public static function getGroupBy($start,$end){
			$sql = "SELECT rgi,nombre, apellido, A,R, F,sum(A + R + F) as T 
					FROM (SELECT al.nombre,al.apellido, a.rgi, COUNT(a.status) A, ifnull(b.retardo,0) as R, ifnull(c.faltas,0) as F 
					FROM asistencias as a inner join alumnos as al on a.rgi=al.rgi left join (SELECT rgi, COUNT(status) as retardo 
					FROM asistencias where status=2 and fecha>=\"$start\" and fecha<=\"$end\" GROUP BY rgi) as b on a.rgi=b.rgi left join (SELECT rgi, COUNT(status) as faltas 
					FROM asistencias where status=0 and fecha>=\"$start\" and fecha<=\"$end\" GROUP BY rgi) as c on a.rgi=c.rgi 
					where a.status=1 and fecha>=\"$start\" and fecha<=\"$end\" and al.clase=0
					GROUP BY rgi) as ivan
					group by rgi";
				   if($start == $end){
					$sql = "select rgi, nombre,apellido, r, f, a, sum(r+f+a)as T 
							from ( select rgi, nombre, apellido, ifnull(retardo,0) as R, ifnull(faltas,0) as F, ifnull(asistencia,0) as A 
							from (select al.rgi,al.nombre,al.apellido, b.retardo, c.faltas, d.asistencia 
							from asistencias as a inner join alumnos as al on a.rgi=al.rgi 
							left join ( SELECT rgi, COUNT(status) as retardo 
							FROM asistencias 
							where status=2 and fecha=\"$start\" 
							GROUP BY rgi) as b on a.rgi=b.rgi 
							left join (SELECT rgi, COUNT(status) as faltas 
							FROM asistencias 
							where status=0 and fecha=\"$start\" 
							GROUP BY rgi) as c on a.rgi=c.rgi 
							left join (SELECT rgi, COUNT(status) as asistencia 
							FROM asistencias 
							where status=1 and fecha=\"$start\" 
							GROUP BY rgi) as d on a.rgi=d.rgi 
							where al.status=1 and al.clase=0
							GROUP by al.rgi) as ivan) as dx 
							group by rgi";
				   }
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
			   }
			   public static function getGroupByGIM($start,$end){
				$sql = "SELECT rgi,nombre, apellido, A,R, F,sum(A + R + F) as T 
						FROM (SELECT al.nombre,al.apellido, a.rgi, COUNT(a.status) A, ifnull(b.retardo,0) as R, ifnull(c.faltas,0) as F 
						FROM asistencias as a inner join alumnos as al on a.rgi=al.rgi left join (SELECT rgi, COUNT(status) as retardo 
						FROM asistencias where status=2 and fecha>=\"$start\" and fecha<=\"$end\" GROUP BY rgi) as b on a.rgi=b.rgi left join (SELECT rgi, COUNT(status) as faltas 
						FROM asistencias where status=0 and fecha>=\"$start\" and fecha<=\"$end\" GROUP BY rgi) as c on a.rgi=c.rgi 
						where a.status=1 and fecha>=\"$start\" and fecha<=\"$end\" and al.clase=1
						GROUP BY rgi) as ivan
						group by rgi";
					   if($start == $end){
						$sql = "select rgi, nombre,apellido, r, f, a, sum(r+f+a)as T 
								from ( select rgi, nombre, apellido, ifnull(retardo,0) as R, ifnull(faltas,0) as F, ifnull(asistencia,0) as A 
								from (select al.rgi,al.nombre,al.apellido, b.retardo, c.faltas, d.asistencia 
								from asistencias as a inner join alumnos as al on a.rgi=al.rgi 
								left join ( SELECT rgi, COUNT(status) as retardo 
								FROM asistencias 
								where status=2 and fecha=\"$start\" 
								GROUP BY rgi) as b on a.rgi=b.rgi 
								left join (SELECT rgi, COUNT(status) as faltas 
								FROM asistencias 
								where status=0 and fecha=\"$start\" 
								GROUP BY rgi) as c on a.rgi=c.rgi 
								left join (SELECT rgi, COUNT(status) as asistencia 
								FROM asistencias 
								where status=1 and fecha=\"$start\" 
								GROUP BY rgi) as d on a.rgi=d.rgi 
								where al.status=1 and al.clase=1
								GROUP by al.rgi) as ivan) as dx 
								group by rgi";
					   }
				$query = Executor::doit($sql);
				return Model::many($query[0],new AsistenciasData());
				   }
			   public static function getAllByDatePagos($start,$end){
				$sql = "select a.rgi, a.nombre, a.apellido, p.folio_recibo, p.cuota,p.ciclo, p.importe, p.fecha_pago, 
				case clase when 0 then 'TKD'
				when 1 then 'GIM' end as clase
				from alumnos as a inner join plan_cuotas as p on a.id_alumno=p.id_alumno 
				where p.status=1 and p.fecha_pago>=\"$start\" and p.fecha_pago<=\"$end\"";
				if($start == $end){
				$sql = "select a.rgi, a.nombre, a.apellido, p.folio_recibo, p.cuota,p.ciclo, p.importe, p.fecha_pago, 
				case clase when 0 then 'TKD'
				when 1 then 'GIM' end as clase
				from alumnos as a inner join plan_cuotas as p on a.id_alumno=p.id_alumno 
				where p.status=1 and p.fecha_pago>=\"$start\"";
					   }
		$query = Executor::doit($sql);
		return Model::many($query[0],new AsistenciasData());
				   }
		
		public static function getByMesPendienteTKD($start){
			$sql = "select a.rgi, a.nombre,a.apellido, p.importe, p.fecha_pago, 'TKD' as clase,substring_index(nombre,' ',1) as n1,substring_index(apellido,' ',1) as ap1
					from plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
					where p.status in (0,2) and a.status=1 and month(p.fecha_vencimiento)=$start and a.clase=0";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
			}
			public static function getByMesPendienteGim($start){
				$sql = "select a.rgi, a.nombre, a.apellido, p.importe, p.fecha_pago, 'Gimnasia' as clase, substring_index(nombre,' ',1) as n1,substring_index(apellido,' ',1) as ap1
						from plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
						where p.status in (0,2) and month(p.fecha_vencimiento)=$start and a.clase=1";
				$query = Executor::doit($sql);
				return Model::many($query[0],new AsistenciasData());
				}
		public static function getByCumpleMes($start){
			$sql = "select *, (year(now())- year(fecha_nac)) as cumple, case clase when 0 then 'TAEKWONDO' 
					when 1 then 'GIMNASIA' end as clase, dir_foto
					from alumnos 
					where month(fecha_nac)=\"$start\" and status=1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
			}
			public static function getByCuotasCicloTKD($start){
				$sql = "select rgi,CONCAT(nombre,' ',apellido) AS alumno,IFNULL(en.importe,'N/A') as Enero,    									IFNULL(fe.importe,'N/A') as Febrero,IFNULL(mar.importe,'N/A') as Marzo,IFNULL(ab.importe,'N/A') as Abril,		IFNULL(m.importe,'N/A') as Mayo, 
								IFNULL(j.importe, 'N/A') as Junio, IFNULL(ju.importe, 'N/A') as Julio, 
								IFNULL(ag.importe, 'N/A') as Agosto, IFNULL(s.importe, 'N/A') as Septiembre, 
								IFNULL(o.importe, 'N/A') as Octubre,IFNULL(n.importe, 'N/A') as Noviembre,
								IFNULL(d.importe, 'N/A') as Diciembre
								from alumnos as a inner join plan_cuotas as p on a.id_alumno=p.id_alumno
													left join (select id_alumno, importe from plan_cuotas
										where cuota=1 and ciclo=\"$start\") as en on en.id_alumno=a.id_alumno
													left join (select id_alumno, importe from plan_cuotas
										where cuota=2 and ciclo=\"$start\") as fe on fe.id_alumno=a.id_alumno
													left join (select id_alumno, importe from plan_cuotas
										where cuota=3 and ciclo=\"$start\") as mar on mar.id_alumno=a.id_alumno
													left join (select id_alumno, importe from plan_cuotas
										where cuota=4 and ciclo=\"$start\") as ab on ab.id_alumno=a.id_alumno
								left join (select id_alumno, importe from plan_cuotas
										where cuota=5 and ciclo=\"$start\") as m on m.id_alumno=a.id_alumno
								left join (select id_alumno, importe from plan_cuotas
										where cuota=6 and ciclo=\"$start\") as j on j.id_alumno=a.id_alumno
								left join (select id_alumno, importe from plan_cuotas
										where cuota=7 and ciclo=\"$start\") as ju on ju.id_alumno=a.id_alumno
								left join (select id_alumno, importe from plan_cuotas
										where cuota=8 and ciclo=\"$start\") as ag on ag.id_alumno=a.id_alumno
								left join (select id_alumno, importe from plan_cuotas
										where cuota=9 and ciclo=\"$start\") as s on s.id_alumno=a.id_alumno
								left join (select id_alumno, importe from plan_cuotas
										where cuota=10 and ciclo=\"$start\") as o on o.id_alumno=a.id_alumno
								left join (select id_alumno, importe from plan_cuotas
										where cuota=11 and ciclo=\"$start\") as n on n.id_alumno=a.id_alumno
								left join (select id_alumno, importe from plan_cuotas
										where cuota=12 and ciclo=\"$start\") as d on d.id_alumno=a.id_alumno
								where clase=0 and a.status=1 and ciclo=\"$start\"
								GROUP by rgi, alumno,en.importe,fe.importe, mar.importe, ab.importe, m.importe, j.importe, ju.importe, ag.importe, s.importe, o.importe,n.importe,d.importe";
				$query = Executor::doit($sql);
				return Model::many($query[0],new AsistenciasData());
				}
				public static function getByCuotasCicloGIM($start){
					$sql = "select rgi,CONCAT(nombre,' ',apellido) AS alumno,IFNULL(en.importe,'N/A') as Enero,    									IFNULL(fe.importe,'N/A') as Febrero,IFNULL(mar.importe,'N/A') as Marzo,IFNULL(ab.importe,'N/A') as Abril,		IFNULL(m.importe,'N/A') as Mayo, 
									IFNULL(j.importe, 'N/A') as Junio, IFNULL(ju.importe, 'N/A') as Julio, 
									IFNULL(ag.importe, 'N/A') as Agosto, IFNULL(s.importe, 'N/A') as Septiembre, 
									IFNULL(o.importe, 'N/A') as Octubre,IFNULL(n.importe, 'N/A') as Noviembre,
									IFNULL(d.importe, 'N/A') as Diciembre
									from alumnos as a inner join plan_cuotas as p on a.id_alumno=p.id_alumno
														left join (select id_alumno, importe from plan_cuotas
											where cuota=1 and ciclo=\"$start\") as en on en.id_alumno=a.id_alumno
														left join (select id_alumno, importe from plan_cuotas
											where cuota=2 and ciclo=\"$start\") as fe on fe.id_alumno=a.id_alumno
														left join (select id_alumno, importe from plan_cuotas
											where cuota=3 and ciclo=\"$start\") as mar on mar.id_alumno=a.id_alumno
														left join (select id_alumno, importe from plan_cuotas
											where cuota=4 and ciclo=\"$start\") as ab on ab.id_alumno=a.id_alumno
									left join (select id_alumno, importe from plan_cuotas
											where cuota=5 and ciclo=\"$start\") as m on m.id_alumno=a.id_alumno
									left join (select id_alumno, importe from plan_cuotas
											where cuota=6 and ciclo=\"$start\") as j on j.id_alumno=a.id_alumno
									left join (select id_alumno, importe from plan_cuotas
											where cuota=7 and ciclo=\"$start\") as ju on ju.id_alumno=a.id_alumno
									left join (select id_alumno, importe from plan_cuotas
											where cuota=8 and ciclo=\"$start\") as ag on ag.id_alumno=a.id_alumno
									left join (select id_alumno, importe from plan_cuotas
											where cuota=9 and ciclo=\"$start\") as s on s.id_alumno=a.id_alumno
									left join (select id_alumno, importe from plan_cuotas
											where cuota=10 and ciclo=\"$start\") as o on o.id_alumno=a.id_alumno
									left join (select id_alumno, importe from plan_cuotas
											where cuota=11 and ciclo=\"$start\") as n on n.id_alumno=a.id_alumno
									left join (select id_alumno, importe from plan_cuotas
											where cuota=12 and ciclo=\"$start\") as d on d.id_alumno=a.id_alumno
									where clase=1 and a.status=1 and ciclo=\"$start\"
									GROUP by rgi, alumno,en.importe,fe.importe, mar.importe, ab.importe, m.importe, j.importe, ju.importe, ag.importe, s.importe, o.importe,n.importe,d.importe";
					$query = Executor::doit($sql);
					return Model::many($query[0],new AsistenciasData());
					}
		public static function getByMesPagadasTKD($start){
			$sql = "select a.rgi, a.nombre, a.apellido, p.importe, p.fecha_pago, substring_index(nombre,' ',1) as n1,substring_index(apellido,' ',1) as ap1
					from plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
					where p.status=1 and month(p.fecha_vencimiento)=$start";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
			}
			public static function getByMesPagadasGim($start){
				$sql = "select a.rgi, a.nombre,a.apellido, p.importe, p.fecha_pago,substring_index(nombre,' ',1) as n1,substring_index(apellido,' ',1) as ap1
						from plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
						where p.status=1 and month(p.fecha_vencimiento)=$start and a.clase=1";
				$query = Executor::doit($sql);
				return Model::many($query[0],new AsistenciasData());
				}
		/*public static function getAllFaltas(){
			$sql = "select a.rgi,c.id_categoria,c.horario,a.fecha,a.hora_entrada, a.status,concat(al.nombre,' ',al.apellido) as alumno 
					FROM asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno 
					inner join categorias as c on al.id_categoria=c.id_categoria
					where a.status=0 ";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
		}*/
		public static function getAllFaltas(){
			$sql = "select a.rgi,c.id_categoria,c.horario,a.fecha,a.hora_entrada, a.status,concat(al.nombre,' ',al.apellido) as alumno 
					FROM asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno 
					inner join categorias as c on al.id_categoria=c.id_categoria
					where DATEDIFF(CURDATE(), STR_TO_DATE(fecha, '%Y-%m-%d')) <= 15 and a.status=0
					and al.clase=0";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
		}
		public static function getAllFaltasGIM(){
			$sql = "select a.rgi,c.id_categoria,c.horario,a.fecha,a.hora_entrada, a.status,concat(al.nombre,' ',al.apellido) as alumno 
					FROM asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno 
					inner join categorias as c on al.id_categoria=c.id_categoria
					where DATEDIFF(CURDATE(), STR_TO_DATE(fecha, '%Y-%m-%d')) <= 15 and a.status=0
					and al.clase=1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
		}

	//Funcion para mostrar todas las solicitudes que estan aprobadas en perfil tesoreria
		/*public static function getAllAprobadas(){
		$sql = "select * from ".self::$tablename." as s inner join tusuarios as u on s.id_usuario=u.id 
			where (gasolina_efectivo<>0 or alimentacion<>0 or casetas<>0 or hospedaje<>0) and id_status=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
	//Funcion para mostrar todas las solicitudes que estan aprobadas en perfil tesoreria
	public static function getAllAprobadasAux(){
	$sql = "select s.id_solicitud, concat(u.name,' ', u.lastname) as nombre, s.fecha_solic, s.fecha_salida, 
			s.fecha_retorno, s.id_status, s.fecha_status, s.pagada, s.fecha_pago, c.fecha_comprob, s.solovales,
			s.comprobacion 
			from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id 
			left join tcomprobaciones as c on s.id_solicitud=c.id_solicitud 
			where solovales=0 and id_status=1 ";
	$query = Executor::doit($sql);
	return Model::many($query[0],new SolicitudData());

}
//funcion innecesaria xq pueden haber 2 juridicos y mostrarian las de ambos
	public static function getJuridico(){
		$sql = "select *
				from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id 
				inner join tusuarios_perfiles as up on u.id=up.id_usuario 
				left join tcomprobaciones as c on s.id_solicitud=c.id_solicitud 
				where up.id_perfil=9";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}

	public static function getByComprob(){
		$sql = "select * from ".self::$tablename." 
		where comprobacion=1 and id_usuario= ".UserData::getById($_SESSION["user_id"])->id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
//Funcion para mostrar todas las solicitudes con estado pendiente
	public static function getByStatus0(){
		$sql = "select * from ".self::$tablename." 
		where id_status=3 and id_usuario= ".UserData::getById($_SESSION["user_id"])->id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
//Funcion para mostrar todas las solicitudes con estado aprobado
		public static function getByStatus1(){
		$sql = "select * from ".self::$tablename." 
		where id_status=1 and id_usuario= ".UserData::getById($_SESSION["user_id"])->id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
//Funcion para mostrar todas las solicitudes de acuerdo al gerente del departamento asignado
	public static function getByGerente(){
		
		$sql= "select u.id,s.id_solicitud,s.gasolina_efectivo, s.gasolina_vales, s.alimentacion, s.casetas, 
			   s.hospedaje,u.id_departamento,u.name as name_u,lastname,fecha_solic,s.concepto, objetivo,
			   fecha_salida,fecha_retorno, vobo, pagada, id_status, fecha_vobo, fecha_pago, fecha_status, 
			   comprobacion, c.fecha_comprob, solovales
			   from tsolviaticos as s inner join tusuarios as u on s.id_usuario=u.id 
			   inner join tdepartamentos as d on d.id_departamento=u.id_departamento 
			   left join tcomprobaciones as c on s.id_solicitud=c.id_solicitud 
			   where d.id_departamento=".UserData::getById($_SESSION["user_id"])->id_departamento." 
			   order by s.id_solicitud";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());

	}
	public static function getGroupByDate($start,$end){
  $sql = "select count(*) as s from ".self::$tablename." where date(fecha_solic) >= \"$start\" and date(fecha_solic) <= \"$end\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SolicitudData());
	}*/

	
}

?>
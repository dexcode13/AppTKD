<?php
/*
* AlumnosData.php
* Modelo de Base de datos para la tabla alumnos del modulo alumnos.
* @author Ing. Iván Hernández
* @date 2019-04-10
*/

class AlumnosData {
	
	public static $tablename = "alumnos";
	
	public function AlumnosData(){
		$this->id_alumno = "";
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = date('Y-m-d');
		$this->fecha_vobo= date('Y-m-d H:i:s');
		$this->fecha_status= date('Y-m-d H:i:s');
		$this->fecha_pago= date('Y-m-d');
		$this->credit_limit = "NULL";
		$this->grado="12";
		$this->status = 1;
		$this->correo_t = "correo@dominio.com";
		$this->facebook = "desconocido"; 
	}

//Función para insertar la solicitud en la tabla alumnos
	public function add(){
		$sql = "insert into ".self::$tablename." (id_categoria,rgi, nombre, apellido,edad, fecha_nac, tipo_sangre, curp, domicilio,colonia, cp, escolaridad, problema_f_m, fecha_exa_ant, fecha_ingreso,fecha_registro, telefono, correo, status, dir_foto) ";
		$sql .= "value (\"$this->categoria\",\"$this->rgi\",\"$this->nombre\",\"$this->apellido\",\"$this->edad\",\"$this->fec_nac\",\"$this->tipo_sangre\",\"$this->curp\",\"$this->direccion\",\"$this->colonia\",\"$this->cp\",\"$this->nivel_esc\",\"$this->problema_f_m\",\"$this->created_at\",\"$this->created_at\",\"$this->fecha_status\",\"$this->telefono\",\"$this->correo\",\"$this->status\",\"$this->foto\")";
		return Executor::doit($sql);
	}
	public function prueba(){
		$sql = "insert into plan_cuotas (id_alumno, cuota, ciclo, fecha_vencimiento, fecha_registro)";
		$sql .= "value (\"$this->alumno\",\"$this->cuota\",\"$this->ciclo\",\"$this->vencimiento\",\"$this->fecha_status\")";
		return Executor::doit($sql);
	}
	public function Anualidad(){
		$sql = "insert into anualidades (id_alumno, rgi, ciclo,status, vencimiento, fecha_registro)";
		$sql .= "value (\"$this->alumno\",\"$this->rgi\",\"$this->year\",0,\"$this->vencimiento\",\"$this->fecha_status\")";
		return Executor::doit($sql);
	}
	public function CrearCuotaAdelantada(){
		$sql = "insert into plan_cuotas (id_alumno, cuota, ciclo, fecha_vencimiento, fecha_registro)";
		$sql .= "value (\"$this->id_alumno\",\"$this->cuota\",\"$this->ciclo\",\"$this->vencimiento\",\"$this->fecha_status\")";
		return Executor::doit($sql);
	}
	public function addGim(){
		$sql = "insert into alumnos (id_categoria, rgi,clase,nombre, apellido,edad, fecha_nac, domicilio,colonia, cp,curp, fecha_ingreso, telefono,status, dir_foto) ";
		$sql .= "value (\"$this->categoria\",\"$this->rgi\",1,\"$this->nombre\",\"$this->apellido\",\"$this->edad\",\"$this->fecha_nac\",\"$this->direccion\",\"$this->colonia\",\"$this->cp\",\"$this->curp\",\"$this->created_at\",\"$this->telefono\",1,\"$this->foto\")";
		return Executor::doit($sql);
	}
	public function addTutores(){
		$sql = "insert into tutores (id_alumno, nombre_padre, labor_padre, telefono_padre, nombre_madre, labor_madre, telefono_madre, correo, facebook ) ";
		$sql .= "value (\"$this->id_alumno\",\"$this->nombre_padre\",\"$this->trabajo_padre\",\"$this->tel_padre\",\"$this->nombre_madre\",\"$this->trabajo_madre\",\"$this->tel_madre\",\"$this->correo_t\", \"$this->facebook\")";
		return Executor::doit($sql);
	}
	public function addBackup(){
		$sql = "INSERT INTO backups (nombre,ruta, fecha_generacion)";
		$sql .= "value (\"$this->nombre\",\"$this->ruta\",\"$this->fecha_status\")";
		Executor::doit($sql);
	}
	public function addPlanPagos(){
		$sql = "INSERT INTO plan_cuotas (id_alumno, cuota,ciclo, status, fecha_vencimiento, fecha_registro)
				SELECT id_alumno, month(curdate())+1 as cuota,year(curdate()) as ciclo,0 as status, ADDDATE(DATE(CONCAT_WS('-', YEAR(curdate()), MONTH(curdate()), '5')),INTERVAL 1 MONTH) AS venc, now() as fecha_rg 
				FROM alumnos 
				WHERE status=1 
				order by rgi";
		Executor::doit($sql);
	}
	public function addPlanPagosEnero(){
		$sql = "INSERT INTO plan_cuotas (id_alumno, cuota,ciclo, status, fecha_vencimiento, fecha_registro)
				SELECT id_alumno, 1 as cuota,year(curdate())+1 as ciclo,0 as status, ADDDATE(DATE(CONCAT_WS('-', YEAR(curdate()), MONTH(curdate()), '5')),INTERVAL 1 MONTH) AS venc, now() as fecha_rg 
				FROM alumnos 
				WHERE status=1 
				order by rgi";
		Executor::doit($sql);
	}
	public function addPlanPagosGim(){
		$sql = "INSERT INTO plan_cuotasgim (id_alumno, cuota,ciclo, status, fecha_vencimiento, fecha_registro)
				SELECT id_alumno, month(curdate())+1 as cuota,year(curdate()) as ciclo,0 as status, ADDDATE(DATE(CONCAT_WS('-', YEAR(curdate()), MONTH(curdate()), '5')),INTERVAL 1 MONTH) AS venc, now() as fecha_rg 
				FROM alumnos_gimnasia 
				WHERE status=1 
				order by id_alumno";
		Executor::doit($sql);
	}
	public function addCuotas(){
		$sql = "INSERT INTO cuotas_pagos (cuota, rgi, status, fecha_vencimiento, hora_registro)
				SELECT month(curdate())+1 as cuota, rgi,0, ADDDATE(DATE(CONCAT_WS('-', YEAR(curdate()), MONTH(curdate()), '5')),INTERVAL 1 MONTH) AS venc, now() as fecha_rg 
				from alumnos order by rgi";
		Executor::doit($sql);
	}
	public function addExamen(){
		$sql = "INSERT INTO examenes (id_alumno, grado_cinta_apasar, fecha_exa, status, fecha_exa_ant, grado_cinta_actual,fecha_created)";
		$sql .= "value (\"$this->id_alumno\",\"$this->grado_cinta_apasar\",\"$this->fecha_exa\",0,\"$this->fecha_exa_ant\",\"$this->grado_cinta_actual\",\"$this->created_at\")";
		Executor::doit($sql);
    }
    public function updatePlanCuotas(){
		$sql = "update plan_cuotas
				set status=2
				where fecha_vencimiento<curdate() and status<>1";
		Executor::doit($sql);
	}
	public function updatePlanCuotasGim(){
		$sql = "update plan_cuotasgim
				set status=2
				where fecha_vencimiento<curdate() and status<>1";
		Executor::doit($sql);
	}
	public function addRecibo(){
		$sql = "insert into recibos_pagos (rfc,nombre, correo, concepto,monto,fecha) ";
		$sql .= "value (\"$this->rfc\",\"$this->cliente\",\"$this->correo\",\"$this->concepto\",\"$this->monto\",\"$this->created_at\")";
		Executor::doit($sql);
	}
	public function addPagoMes(){
		$sql = "insert into mensualidades (rgi, concepto, mes, monto, fecha_pago, status) ";
		$sql .= "value (\"$this->rgi\",'MENSUALIDAD',\"$this->concepto\",\"$this->monto\",\"$this->fecha_pago\",1)";
		Executor::doit($sql);
	}
	public function addCobroGral(){
		$sql = "insert into cobros_generales (folio, fecha_pago, nombre, importe, concepto) ";
		$sql .= "value (\"$this->folio\",\"$this->fecha_pago\",\"$this->cliente\",\"$this->importe\",\"$this->concepto\")";
		Executor::doit($sql);
	}
	public function updateFalta(){
		$sql = "update asistencias 
				set status=\"$this->status\", hora_entrada=\"$this->hora\"
				where fecha=\"$this->fecha\" and rgi=$this->rgi";
		Executor::doit($sql);
	}
	public function updateCuota(){
		$sql = "update plan_cuotas 
				set status=1, fecha_pago=\"$this->fecha_PagoCuota\", importe=\"$this->importe\",
				folio_recibo=\"$this->folio\"
				where id_cuota=$this->id_cuota";
		Executor::doit($sql);
	}
	public function updateAnualidadTKD(){
		$sql = "update anualidades 
				set status=1, fecha_pago=\"$this->fecha_PagoAnualidad\", monto=\"$this->importe\",
				folio=\"$this->folio\"
				where id_control=$this->id_control";
		Executor::doit($sql);
	}
	public function updateAnualidadGIM(){
		$sql = "update anualidades 
				set status=1, fecha_pago=\"$this->fecha_PagoAnualidad\", monto=\"$this->importe\",
				folio=\"$this->folio\"
				where id_control=$this->id_control";
		Executor::doit($sql);
	}
	public function updateCuotaGim(){
		$sql = "update plan_cuotas 
				set status=1, fecha_pago=\"$this->fecha_PagoCuota\", importe=\"$this->importe\",
				folio_recibo=\"$this->folio\"
				where id_cuota=$this->id_cuota";
		Executor::doit($sql);
	}
	public function ReingresarAlumno(){
		$sql = "update alumnos 
				set status=1, fecha_reingreso=\"$this->created_at\"
				where rgi=$this->rgi";
		Executor::doit($sql);
	}
	public function updateDatosPersonales(){
		$sql = "update ".self::$tablename." 
				set nombre=\"$this->name\",apellido=\"$this->lastname\",fecha_nac=\"$this->fec_nac\",
				grado_cinta=\"$this->grado\",curp=\"$this->curp\", fecha_ingreso=\"$this->ingreso\",
				correo=\"$this->correo\", id_categoria=\"$this->categoria\",dir_foto=\"$this->foto\"
				where rgi=$this->rgi";
		Executor::doit($sql);
	}
	public function updateDatosPersonalesGim(){
		$sql = "update alumnos
				set nombre=\"$this->name\",apellido=\"$this->lastname\",fecha_nac=\"$this->fec_nac\",
				domicilio=\"$this->direccion\",curp=\"$this->curp\",id_categoria=\"$this->categoria\",
				colonia=\"$this->colonia\", cp=\"$this->cp\", 
				dir_foto=\"$this->foto\"
				where rgi=$this->rgi";
		Executor::doit($sql);
	}
	public function bajaAlumno(){
		$sql = "update ".self::$tablename." 
				set motivo_baja=\"$this->motivo\", status=\"$this->status\", fecha_baja=\"$this->created_at\"
				where rgi=$this->rgi";
		Executor::doit($sql);
	}
	public function updateDatosPadres(){
		$sql = "update tutores
				set nombre_padre=\"$this->nombre_p\",labor_padre=\"$this->labor_p\",telefono_padre=\"$this->telefono_p\",
				nombre_madre=\"$this->nombre_m\",labor_madre=\"$this->labor_m\", telefono_madre=\"$this->telefono_m\"
				where id_tutor=$this->tutor_id";
		Executor::doit($sql);
	}
	public function updateHorarioInf(){
		$sql = "update categorias
				set horario=\"$this->primero\"
				where id_categoria=\"$this->id_cat\"";
		Executor::doit($sql);
	}
	public function updateHorarioKIDS(){
		$sql = "update categorias
				set horario=\"$this->primero\"
				where id_categoria=\"$this->id_kids\"";
		Executor::doit($sql);
	}
	public function updateHorarioJuv(){
		$sql = "update categorias
				set horario=\"$this->segundo\"
				where id_categoria=\"$this->id_juv\"";
		Executor::doit($sql);
	}
	public function updateHorarioinfan(){
		$sql = "update categorias
				set horario=\"$this->segundo\"
				where id_categoria=\"$this->id_infan\"";
		Executor::doit($sql);
	}
	public function updateHorarioAdul(){
		$sql = "update categorias
				set horario=\"$this->tercero\"
				where id_categoria=\"$this->id_adult\"";
		Executor::doit($sql);
	}
	public function updateHorarioNegras(){
		$sql = "update categorias
				set horario=\"$this->septimo\"
				where id_categoria=\"$this->id_negra\"";
		Executor::doit($sql);
	}
	public function updateHorarioAvanz(){
		$sql = "update categorias
				set horario=\"$this->tercero\"
				where id_categoria=\"$this->id_avanz\"";
		Executor::doit($sql);
	}

		public static function getCorteDia(){
			$sql = "select a.rgi, concat(a.nombre,' ',a.apellido) as completo,p.fecha_pago, c.nombre as name,
					p.id_cuota, p.status as estado_cuota, p.cuota, p.fecha_vencimiento, p.importe 
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria 
					inner join plan_cuotas as p on p.id_alumno=a.id_alumno 
					where a.status=1 and p.fecha_pago=curdate()"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getAllPagosPendientes(){
			$sql = "select a.*, c.nombre as name,p.id_cuota, p.status as estado_cuota, p.cuota, p.fecha_vencimiento
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria 
					inner join plan_cuotas as p on p.id_alumno=a.id_alumno 
					where a.status=1"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		//edite la condicion para que pueda imprimir cualquier recibo que desee "and fecha_pago=curdate()"
		public static function getReimpresiones(){
			$sql = "select a.rgi,a.nombre,a.apellido, c.nombre as name,p.folio_recibo,p.fecha_pago, p.id_cuota, 
					p.status as estado_cuota, p.cuota, p.fecha_vencimiento, p.importe
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria 
					inner join plan_cuotas as p on p.id_alumno=a.id_alumno 
					where a.status=1 and p.status=1 and a.clase=0"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		//edite la condicion para que pueda imprimir cualquier recibo que desee "and fecha_pago=curdate()"
		public static function getReimpresionesGim(){
			$sql = "select a.rgi,a.nombre,a.apellido,p.folio_recibo,p.fecha_pago, p.id_cuota, p.status as estado_cuota, p.cuota, p.fecha_vencimiento, p.importe 
					from alumnos as a inner join plan_cuotas as p on p.id_alumno=a.id_alumno 
					where a.status=1 and p.status=1 and a.clase=1"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		//edite la condicion para que pueda imprimir cualquier recibo que desee where fecha_pago=curdate()
		public static function getPrintGrales(){
			$sql = "select *
					from cobros_generales"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getAlumnosGim(){
			$sql = "select a.*,c.nombre as categoria
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria
					where clase=1 and status=1"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getByIdRecibo($id){
			$sql = "select p.*, a.nombre, a.apellido, a.rgi
					FROM plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno
					where id_cuota=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByTotalGrales(){
			$fecha = date('Y-m-d');
			$sql = "select sum(importe) as total
					FROM cobros_generales
					where fecha_pago='$fecha'";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getAllAlumnos(){
			$sql = "select a.*, c.nombre as cate
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getAllAlumnosActivos(){
			$sql = "select a.*, c.nombre as categoria
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria
					where a.status=1 and a.clase=0"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getAnualidadesTKD(){
			$sql = "SELECT a.*, concat(b.nombre,' ',b.apellido) as name 
						FROM anualidades as a inner join alumnos as b on a.id_alumno=b.id_alumno 
						where b.clase=0 and b.status=1 and a.status=1"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getAnualidadesGIM(){
			$sql = "SELECT a.*, concat(b.nombre,' ',b.apellido) as name 
						FROM anualidades as a inner join alumnos as b on a.id_alumno=b.id_alumno 
						where b.clase=1 and b.status=1 and a.status=1"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getAllAlumnosActivosGIM(){
			$sql = "select a.*, c.nombre as categoria
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria
					where a.status=1 and a.clase=1"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getPagosGrales(){
			$sql = "select rgi,CONCAT(nombre,' ',apellido) AS alumno, IFNULL(m.importe,'N/A') as Mayo, 
							IFNULL(j.importe, 'N/A') as Junio, IFNULL(ju.importe, 'N/A') as Julio, 
							IFNULL(ag.importe, 'N/A') as Agosto, IFNULL(s.importe, 'N/A') as Septiembre, 
							IFNULL(o.importe, 'N/A') as Octubre,IFNULL(n.importe, 'N/A') as Noviembre,
							IFNULL(d.importe, 'N/A') as Diciembre
							from alumnos as a inner join plan_cuotas as p on a.id_alumno=p.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=5) as m on m.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=6) as j on j.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=7) as ju on ju.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=8) as ag on ag.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=9) as s on s.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=10) as o on o.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=11) as n on n.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=12) as d on d.id_alumno=a.id_alumno
							where clase=0 and a.status=1
							GROUP by rgi, alumno, m.importe, j.importe, ju.importe, ag.importe, s.importe, o.importe,n.importe,d.importe"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getPagosGralesGim(){
			$sql = "select a.rgi,CONCAT(nombre,' ',apellido) AS alumno, IFNULL(m.importe,'N/A') as Mayo, 
							IFNULL(j.importe, 'N/A') as Junio, IFNULL(ju.importe, 'N/A') as Julio, 
							IFNULL(ag.importe, 'N/A') as Agosto, IFNULL(s.importe, 'N/A') as Septiembre, 
							IFNULL(o.importe, 'N/A') as Octubre,IFNULL(n.importe, 'N/A') as Noviembre,
							IFNULL(d.importe, 'N/A') as Diciembre
							from alumnos as a inner join plan_cuotas as p on a.id_alumno=p.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=5) as m on m.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=6) as j on j.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=7) as ju on ju.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=8) as ag on ag.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=9) as s on s.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=10) as o on o.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=11) as n on n.id_alumno=a.id_alumno
							left join (select id_alumno, importe from plan_cuotas
									where cuota=12) as d on d.id_alumno=a.id_alumno
							where clase=1 and a.status=1
							GROUP by a.rgi, alumno, m.importe, j.importe, ju.importe, ag.importe, s.importe, o.importe,n.importe,d.importe"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getPagos(){
			$sql = "select concat(a.nombre,' ',a.apellidos) as alumno, p.mes, p.concepto, a.rgi,p.monto, p.fecha_pago,
					(case when folio is null then 'pendiente' else 'pagado' end) as pago 
					from alumnos as a left join mensualidades as p on a.rgi=p.rgi
					"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getCortePrint(){
			$sql = "select '' as concepto, importe,apellido, 'TKD' AS cobro,cuota, substring_index(nombre,' ',1) as n1 
					from plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
					where fecha_pago=curdate() and a.clase=0 
					union ALL 
					select '' as concepto, importe,apellido, 'GIM' as cobro,cuota, substring_index(nombre,' ',1) as n1 
					from plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
					where fecha_pago=curdate() and a.clase=1 
					union all 
					select concepto, importe, nombre, 'C.GRAL' as cobro,'' as cuota, substring_index(nombre,' ',1) as n1 
					from cobros_generales 
					where fecha_pago=curdate()"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getCortePrintGim(){
			$sql = "select 'Mensualidad' as concepto, importe,  importe-125 as diferencia, nombre, substring_index(nombre,' ',1) as n1, apellido, 'GIM' as cobro, cuota 
					from plan_cuotas as p inner join alumnos as a 
					on p.id_alumno=a.id_alumno 
					where fecha_pago=curdate() and a.clase=1"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());

		}
		public static function getCobrosGrales($start,$end){
			$sql = "select *
					from cobros_generales
					where fecha_pago>=\"$start\" and fecha_pago<=\"$end\"";
				   if($start == $end){
					$sql = "select *
					from cobros_generales
					where fecha_pago>=\"$start\"";
				   }
	$query = Executor::doit($sql);
	return Model::many($query[0],new AsistenciasData());
			   }
		public static function getByCuotaImpre($id){
			$sql = "select a.rgi, a.nombre,a.apellido, c.nombre as name,p.folio_recibo,p.fecha_pago, 
					p.id_cuota, p.status as estado_cuota, p.cuota, p.fecha_vencimiento, p.importe 
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria 
					inner join plan_cuotas as p on p.id_alumno=a.id_alumno 
					where a.status=1 and p.status=1 and p.id_cuota=$id"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByCuotaImpreGim($id){
			$sql = "select a.rgi, a.nombre,a.apellido,p.folio_recibo,p.fecha_pago, p.id_cuota, p.status as estado_cuota, p.cuota, p.fecha_vencimiento, p.importe 
					from alumnos as a inner join plan_cuotas as p on p.id_alumno=a.id_alumno 
					where a.status=1 and p.status=1 and a.clase=1 and p.id_cuota=$id"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByCobroImpre($id){
			$sql = "select * 
					from cobros_generales
					where id_cobro=$id"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByAlumno($id){
			$sql = "select a.*, c.nombre as categoria, max(e.fecha_exa) as ant, grado_cinta_apasar as cinta
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria
					left join examenes as e on e.id_alumno=a.id_alumno
					where a.rgi=$id"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		/*Eric tendra que cambiar el estado de los examenes cuando se lleven a acabo para poder mostrar los datos
		correcto */
		public static function getByAlumnoExa($id){
			$sql = "select a.*, c.nombre as categoria, max(e.fecha_exa) as ant, grado_cinta_apasar as cinta
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria
					left join examenes as e on e.id_alumno=a.id_alumno
					where a.rgi=$id "; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByAlumnoGim($id){
			$sql = "select a.*, c.nombre as categoria
					from alumnos as a inner join categorias as c on a.id_categoria=c.id_categoria
					where rgi=$id"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByAlumnoGimRGI(){
			$sql = "select max(rgi)+1 as rgi_last
					from alumnos_gimnasia"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByAlumnoPlan($id){
			$sql = "select a.nombre, a.apellido, p.folio_recibo, p.id_alumno, p.fecha_vencimiento, p.cuota,p.ciclo, p.status,
					p.fecha_pago, p.importe
					from alumnos as a inner join plan_cuotas as p on a.id_alumno=p.id_alumno 
					where a.rgi =$id"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getByAlumnoPlanGim($id){
			$sql = "select a.nombre,a.rgi, a.apellido, p.folio_recibo, p.id_alumno, p.fecha_vencimiento, p.cuota,p.ciclo, p.status,
					p.fecha_pago, p.importe
					from alumnos as a inner join plan_cuotas as p on a.id_alumno=p.id_alumno 
					where a.rgi=$id"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getByAlumnoTutor($id){
			$sql = "select t.*, a.rgi from alumnos as a inner join tutores as t on a.id_alumno=t.id_alumno  
					where a.rgi=$id"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByTutor($id){
			$sql = "select t.* from alumnos as a inner join tutores as t on a.id_alumno=t.id_alumno  
					where t.id_tutor=$id"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByAlumExamen($id){
			$sql = "select a.rgi, a.id_categoria, a.nombre, a.apellido, e.* 
					from alumnos as a INNER JOIN examenes as e on a.id_alumno=e.id_alumno  
					where a.rgi=$id"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AsistenciasData());
		}
		public static function getByJustificaciones($id){
			$sql = "select j.id_asistencia,observacion, fecha_justificada, j.id_alumno 
					from justificaciones as j inner join asistencias as a 
					on j.id_asistencia=a.id_asistencia 
			        where j.id_asistencia=$id"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByFaltas($id, $fecha){
			$sql = "select a.*, aa.fecha, aa.id_asistencia
					from alumnos as a inner join asistencias as aa on a.id_alumno=aa.id_alumno
					where a.rgi=\"$id\" and aa.fecha=\"$fecha\""; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public function addJustificacion(){
			$sql = "insert into justificaciones (id_alumno,id_asistencia,fecha_justificada, observacion) ";
			$sql .= "value (\"$this->id_alumno\",\"$this->id_asistencia\",\"$this->fecha\",\"$this->observacion\")";
			Executor::doit($sql);
		}
		public static function getByUpdateFaltas($id){
			$sql = "select a.*, aa.fecha
					from alumnos as a inner join asistencias as aa on a.rgi=aa.rgi
					where a.rgi=$id"; 
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getAllCategorias(){
			$sql = "select * 
					FROM categorias where class=0";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getAllCategoriasGIM(){
			$sql = "select * 
					FROM categorias where class=1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getAllTipoSangre(){
			$sql = "select * 
							FROM tipos_sangre";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getAllCat1(){
			$sql = "select * 
					FROM categorias
					where id_categoria=1";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByCat1(){
			$sql = "select * 
					FROM alumnos
					where id_categoria=1 and status=1 and clase=0";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getByCat2(){
			$sql = "select * 
					FROM alumnos
					where id_categoria=2 and status=1 and clase=0";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getByCat3(){
			$sql = "select * 
					FROM alumnos
					where id_categoria=3 and status=1 and clase=0";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getByPendientesXmesTKD(){
			$sql = "select * 
							FROM plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
							where cuota=month(curdate()) and p.status in (0,2) and a.clase=0 and a.status=1 ";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getByPendientesXmesGIM(){
			$sql = "select * 
							FROM plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
							where cuota=month(curdate()) and p.status in (0,2) and a.clase=1 and a.status=1 ";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getByAsistenciaMejorTKD(){
			$sql = "select id_alumno, rgi, nombre, max(total) 
							from (select a.id_alumno, a.rgi, concat(al.nombre,' ',al.apellido) as nombre ,count(*) total 
										from asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno 
										where month(fecha)=month(curdate())-1 and al.clase=0 and a.status in (1,2) 
										GROUP by a.id_alumno,a.rgi, al.nombre 
										order by 4 desc) as dx";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByValoresTKD(){
			$sql = "SELECT rgi,nombre, apellido, A,R, F,sum(A + R + F) as T 
							FROM (SELECT al.nombre,al.apellido, a.rgi, COUNT(a.status) A, ifnull(b.retardo,0) as R, ifnull(c.faltas,0) as F 
							FROM asistencias as a inner join alumnos as al on a.rgi=al.rgi 
							inner join (SELECT rgi, COUNT(status) as retardo 
													FROM asistencias 
													where rgi=".AlumnosData::getByAsistenciaMejorTKD()->rgi." and status=2 and month(fecha)=month(curdate())-1 
													GROUP BY rgi) as b on a.rgi=b.rgi 
							inner join (SELECT rgi, COUNT(status) as faltas 
													FROM asistencias 
													where rgi=".AlumnosData::getByAsistenciaMejorTKD()->rgi." and status=0 and month(fecha)=month(curdate())-1 
													GROUP BY rgi) as c on a.rgi=c.rgi 
							where a.rgi=".AlumnosData::getByAsistenciaMejorTKD()->rgi." and a.status=1 and month(fecha)=month(curdate())-1 and al.clase=0
							GROUP BY rgi) as ivan 
							group by rgi";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByAsistenciaMejorGIM(){
			$sql = "select id_alumno, rgi, nombre, max(total) 
							from (select a.id_alumno, a.rgi, concat(al.nombre,' ',al.apellido) as nombre ,count(*) total 
										from asistencias as a inner join alumnos as al on a.id_alumno=al.id_alumno 
										where month(fecha)=month(curdate())-1 and al.clase=1 and a.status in (1,2) 
										GROUP by a.id_alumno,a.rgi, al.nombre 
										order by 4 desc) as dx";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByValoresGIM(){
			$sql = "SELECT rgi,nombre, apellido, A, R, F,sum(A + R + F) as T 
							FROM (SELECT al.nombre,al.apellido, a.rgi, COUNT(a.status) A, ifnull(b.retardo,0) as R, ifnull(c.faltas,0) as F 
							FROM asistencias as a inner join alumnos as al on a.rgi=al.rgi 
							inner join (SELECT rgi, COUNT(status) as retardo 
													FROM asistencias 
													where rgi=".AlumnosData::getByAsistenciaMejorGIM()->rgi." and status=2 and month(fecha)=month(curdate())-1 
													GROUP BY rgi) as b on a.rgi=b.rgi 
							left join (SELECT rgi, COUNT(status) as faltas 
													FROM asistencias 
													where rgi=".AlumnosData::getByAsistenciaMejorGIM()->rgi." and status=0 and month(fecha)=month(curdate())-1 
													GROUP BY rgi) as c on a.rgi=c.rgi 
							where a.rgi=".AlumnosData::getByAsistenciaMejorGIM()->rgi." and a.status=1 and month(fecha)=month(curdate())-1 and al.clase=1
							GROUP BY rgi) as ivan 
							group by rgi";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		//gim
		public static function getByCat1Gim(){
			$sql = "select * 
					FROM alumnos
					where id_categoria=4 and status=1 and clase=1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getByCat2Gim(){
			$sql = "select * 
					FROM alumnos
					where id_categoria=5 and status=1 and clase=1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getByCat3Gim(){
			$sql = "select * 
					FROM alumnos
					where id_categoria=6 and status=1 and clase=1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getAllCat2(){
			$sql = "select * 
					FROM categorias
					where id_categoria=2";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getAllCat3(){
			$sql = "select * 
					FROM categorias
					where id_categoria=3";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getAllCat7(){
			$sql = "select * 
					FROM categorias
					where id_categoria=7";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getAllCat4(){
			$sql = "select * 
					FROM categorias
					where id_categoria=4";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getAllCat5(){
			$sql = "select * 
					FROM categorias
					where id_categoria=5";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getAllCat6(){
			$sql = "select * 
					FROM categorias
					where id_categoria=6";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getbackups(){
			$sql = "select * from backups";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getCuotas(){
			$sql = "SELECT CASE month(fecha_vencimiento) 
							when 1 then 'Enero' 
							when 2 then 'Febrero' 
							when 3 then 'Marzo' 
							when 4 then 'Abril' 
							when 5 then 'Mayo' 
							when 6 then 'Junio' 
							when 7 then 'Julio' 
							when 8 then 'Agosto' 
							when 9 then 'Septiembre' 
							when 10 then 'Octubre' 
							when 11 then 'Noviembre' else 'Diciembre' end as MesCuota, fecha_vencimiento, fecha_registro, ciclo, count(*) as registros
							FROM plan_cuotas 
							GROUP by month(fecha_vencimiento), ciclo";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getFotos(){
			$sql = "select * from alumnos where status=1 ";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getCuotasGim(){
			$sql = "SELECT CASE month(fecha_vencimiento) when 1 then 'Enero' when 2 then 'Febrero' when 3 then 'Marzo' when 4 then 'Abril' when 5 then 'Mayo' when 6 then 'Junio' when 7 then 'Julio' when 8 then 'Agosto' when 9 then 'Septiembre' when 10 then 'Octubre' when 11 then 'Noviembre' else 'Diciembre' end as MesCuota, fecha_vencimiento, fecha_registro, ciclo
					FROM plan_cuotasGim 
					GROUP by month(fecha_vencimiento)";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getCuotasPago($id){
			$sql = "select p.*, a.rgi, a.nombre, a.apellido 
					from plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
					where a.rgi=$id and p.status<>1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getPagosPendientes(){
			$sql = "select p.*, a.rgi, a.nombre, a.apellido 
					from plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
					where p.status<>1 and a.status=1 and a.clase=0";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getAlumnosAnticipados(){
			$sql = "select * 
							from  alumnos  
							where status=1 and clase=0";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getAnualidadesPendientesTKD(){
			$sql = "select p.*,concat(a.nombre,' ', a.apellido) as name, a.rgi  
							from anualidades as p inner join alumnos as a on p.id_alumno=a.id_alumno 
							where p.status<>1 and a.status=1 and a.clase=0";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getAnualidadesPendientesGIM(){
			$sql = "select p.*,concat(a.nombre,' ', a.apellido) as name, a.rgi  
							from anualidades as p inner join alumnos as a on p.id_alumno=a.id_alumno 
							where p.status<>1 and a.status=1 and a.clase=1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getPagosPendientesGim(){
			$sql = "select p.id_cuota,p.importe,p.fecha_pago,p.status,p.cuota,p.ciclo, a.rgi, a.nombre as nombre, a.apellido as apellido
					from plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
					where p.status<>1 and a.status=1 and a.clase=1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getPagosAnual(){
			$sql = "select rgi,CONCAT(nombre,' ',apellido) AS alumno, IFNULL(e.importe,0.0) as Enero,IFNULL(f.importe,0.0) as Febrero,IFNULL(ma.importe,0.0) as Marzo,IFNULL(ab.importe,0.0) as Abril,IFNULL(m.importe,0.0) as Mayo, j.importe as Junio, ju.importe as Julio, ag.importe as Agosto, s.importe as Septiembre, IFNULL(o.importe, 0.0) as Octubre,IFNULL(n.importe, 0.0) as Noviembre,IFNULL(d.importe, 0.0) as Diciembre
					from alumnos as a inner join plan_cuotas as p on a.id_alumno=p.id_alumno
					left join (select id_alumno, importe from plan_cuotas
							where cuota=1) as e on e.id_alumno=a.id_alumno
					left join (select id_alumno, importe from plan_cuotas
							where cuota=2) as f on f.id_alumno=a.id_alumno
					left join (select id_alumno, importe from plan_cuotas
							where cuota=3) as ma on ma.id_alumno=a.id_alumno
					left join (select id_alumno, importe from plan_cuotas
							where cuota=4) as ab on ab.id_alumno=a.id_alumno
					inner join (select id_alumno, importe from plan_cuotas
							where cuota=5) as m on m.id_alumno=a.id_alumno
					inner join (select id_alumno, importe from plan_cuotas
							where cuota=6) as j on j.id_alumno=a.id_alumno
					inner join (select id_alumno, importe from plan_cuotas
							where cuota=7) as ju on ju.id_alumno=a.id_alumno
					inner join (select id_alumno, importe from plan_cuotas
							where cuota=8) as ag on ag.id_alumno=a.id_alumno
					inner join (select id_alumno, importe from plan_cuotas
							where cuota=9) as s on s.id_alumno=a.id_alumno
					left join (select id_alumno, importe from plan_cuotas
							where cuota=10) as o on o.id_alumno=a.id_alumno
					left join (select id_alumno, importe from plan_cuotas
							where cuota=11) as n on n.id_alumno=a.id_alumno
					left join (select id_alumno, importe from plan_cuotas
							where cuota=12) as d on d.id_alumno=a.id_alumno
					GROUP by rgi, alumno, e.importe, f.importe,ma.importe,ab.importe,m.importe, j.importe, ju.importe, ag.importe, s.importe, o.importe,n.importe,d.importe";
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}
		public static function getByCuota($id){
			$sql = "select p.*, a.rgi, a.nombre, a.apellido 
					from plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno 
					where p.id_cuota=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new AlumnosData());
		}
		public static function getByPlan(){
			$sql = "select * 
					from plan_cuotas 
					where month(fecha_vencimiento)=month(curdate())"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		
		}
		public static function getByPlanGim(){
			$sql = "select * 
					from plan_cuotasgim
					where month(fecha_vencimiento)=month(curdate())"; 
			$query = Executor::doit($sql);
			return Model::many($query[0],new AlumnosData());
		}

	
}

?>
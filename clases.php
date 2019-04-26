<?php
/*$inicio = new DateTime('2018-04-01');
$intervalo = new DateInterval('P1D');
$fin = new DateTime('2018-04-30');

$periodo = new DatePeriod($inicio, $intervalo, $fin);
$holidays = [
    '2018-04-06' => true
  ];
  $cont = 1;
foreach ($periodo as $fecha) {
    $weekDay = $fecha->format('N');
   
    if ($weekDay !== '2' && $weekDay !== '4' && $weekDay !== '6' &&  $weekDay !== '7' && !isset($holidays[$fecha->format('Y-m-d')])) 
    {
        echo $fecha->format('Y-m-d')."<br>";
        
        $cont++;
    }   
}
echo $DiasClase = $cont-1; */

$fecha = date('j');
echo $fecha;
	if($fecha>=25 || $fecha<=31){
		echo  "Lo sentimos, ya existe un plan para el mes actual";
	}
	else{
		echo "Plan Gimnasia de Pagos Generado";
	}
/*if($fecha>=25 && $fecha<=31){
    echo "se puede generar plan";
}else{
    echo "no se puede generar plan";
}*/
?>

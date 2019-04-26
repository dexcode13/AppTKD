<?php
/*$fechaInicio = strtotime("2016-08-01");
$fechaFin = strtotime("2016-08-20");

//Recorro las fechas y con la función strotime obtengo los lunes
for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400 * 7){
    echo date("Y-m-d", strtotime('monday this week', $i)).'<br>';
}*/
/*$fechaactual=date("Y-m-d");
$fechaInicio=strtotime("2018-01-01");
$fechaFin=strtotime($fechaactual);
//Recorro las fechas y con la función strotime obtengo los lunes
$contador=1;
for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
    //Sacar el dia de la semana con el modificador N de la funcion date
    $dia = date('N', $i);
    if($dia==1 || $dia==3 || $dia==5){
        echo "fecha de clase en febrero ". date ("Y-m-d", $i)."<br>";
        $contador++;
    }
}
echo $contador-1;*/
/*$arrayFestivos = array('01/01/2017', '06/01/2017');
$currentMonth = date('t');
for($i = 1; $i <= $currentMonth; $i += 1) {
    if(!in_array(date('d/m/Y', strtotime($i.'/'.date("m").'/'.date("Y"))), $arrayFestivos) && (date('w') != 0 && date('w') != 6)){
        echo $i; //El día no es ni sábado, ni domingo ni festivo.
    }
}*/
$format = 'Y-m-d';
//$startDateString = '2017-03-01';
//$endDateString = '2017-03-31';
//$startDateTime = DateTime::createFromFormat($format, $startDateString);
//$endDateTime = DateTime::createFromFormat($format, $endDateString);
//$dateInterval = new DateInterval('P1D');
$startDateTime = new DateTime('first day of this month');
$endDateTime = new DateTime('last day of this month');
$dateInterval = new DateInterval('P1D');
$days = new DatePeriod($startDateTime, $dateInterval, $endDateTime);
$holidays = [
    '2018-05-01' => true
  ];
foreach ($days as $day) {
    // Asignamos un número por cada día de la semana 6 y 7 para sábado y domingo
    $weekDay = $day->format('N');
    // Si es sábado, domingo o festivo no lo imprime
    if ($weekDay !== '6' &&  $weekDay !== '7' && !isset($holidays[$day->format('Y-m-d')])) 
    {
      print_r($day->format('d-m-Y'));
      echo"<br>";
      echo PHP_EOL;
    }
  }
/*echo "Fecha actual Unix con parámetro 'now' -->" . strtotime("now") . "<br>";
echo "Fecha pasada '15 May 2015' -->" . strtotime("15 May 2015") . "<br>";
echo "Fecha actual + 1 hora -->" . strtotime("+1 hours") . "<br>";
echo "Fecha actual + 1 día -->" . strtotime("+1 day") . "<br>";
echo "Fecha actual + 1 semana -->" . strtotime("+1 week") . "<br>";
echo "Fecha actual + 1 mes -->" . strtotime("+1 month") . "<br>";
echo "Fecha actual + 1 año -->" . strtotime("+1 year") . "<br>";
echo "Fecha actual + 1 año + 1 mes + 1 semana + 1 día + 1 hora -->" . strtotime("+1 year +1 month +1 week +1 day +1 hours") . "<br>";
echo "Próximo lunes -->" . strtotime("next monday") . "<br>";
echo "El pasado lunes -->" . strtotime("last monday") . "<br>";
echo "Próxima semana -->" . strtotime("next week") . "<br>";
echo "Próximo mes -->" . strtotime("next month") . "<br>";
echo "Próximo año -->" . strtotime("next year") . "<br>";*/
?>
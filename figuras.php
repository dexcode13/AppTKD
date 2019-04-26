<html>
<head>
<style>
            .circulo {
                width: 25px; 
                height: 25px; 
                background: red; 
                -moz-border-radius: 12.5px; 
                -webkit-border-radius: 12.5px; 
                border-radius: 12.5px;
            }
            img {
            border-radius: 50px;
            border: 5px solid green;
}
</style>
</head>
<body>
<div class="circulo">

</div>
<img src="img/ivan.jpg" alt="Perfil" width="300" height="300"><br>
<?php 
//date_default_timezone_set ('Amercia/Mexico_City');
date_default_timezone_set('America/Merida');
// Unix
//setlocale(LC_TIME, 'es_ES.UTF-8');
// En windows
setlocale(LC_TIME, 'spanish');
$year = date('Y');
$month = date('m');
//$day = date('d');
$day=16;
if($day>=1 && $day<6)
{
    echo "pagas $250<br>";
}
else if ($day>5 && $day<11)
{
    echo "pagas $300<br>";
}
else if($day>=10 && $day<16)
{
    echo "pagas $350<br>";
}

echo $year."<br>";
echo $month."<br>";
echo $day."<br>";
echo 'Fecha actual: '.strftime("%B").'<br/>';
setlocale(LC_TIME, 'spanish');
$mes = strftime("%B");
echo $mes;
$mes_mayus = strtoupper($mes);
echo $mes_mayus;

?>
</body>
</html>
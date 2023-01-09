<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEATHER APP</title>
</head>

<body>
<?php 
$datos = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=Malaga&appid=99b4f1ed7a98ffa3bec2928d6c009879");  
echo "<h3>Datos en bruto (en formato JSON): </h3>$datos<hr>"; 
$tiempo = json_decode($datos);  
echo "<h3>Datos en un objeto: </h3>";  
print_r($tiempo);  
echo "<hr>"; 
echo "<h3>Datos sueltos: </h3>"; 
echo "Temperatura: ".$tiempo->main->temp."ºC<br>";  
echo "Humedad: ".$tiempo->main->humidity."%<br>";  
echo "Presión: ".$tiempo->main->pressure."mb<br>";  
?> 
</body>

</html>
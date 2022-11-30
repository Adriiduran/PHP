<?php 
    include_once 'Cubo.php';

    $cubo1 = new Cubo(20,10);
    $cubo2 = new Cubo(20,13);

    echo "La capacidad del cubo 1 es: ".$cubo1 -> getCapacidad(). " y el contenido es: ". $cubo1 -> getContenido() ."<br>";

    echo "La capacidad del cubo 2 es: ".$cubo2 -> getCapacidad(). " y el contenido es: ". $cubo2 -> getContenido() ."<br>";

    $cubo2 -> verter($cubo1);

    echo "La capacidad del cubo 1 es: ".$cubo1 -> getCapacidad(). " y el contenido es: ". $cubo1 -> getContenido() ."<br>";

    echo "La capacidad del cubo 2 es: ".$cubo2 -> getCapacidad(). " y el contenido es: ". $cubo2 -> getContenido() ."<br>";
?>
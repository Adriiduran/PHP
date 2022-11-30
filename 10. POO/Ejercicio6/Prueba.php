<?php 
    include_once 'Bicicleta.php';
    include_once 'Coche.php';

    $bici = new Bicicleta(200,"orbea","negro");
    $coche = new Coche(10000,"renault","blanco");

    echo $bici->anda();
    echo $bici->caballito();
    echo $coche->anda();
    echo $coche->quemaRueda();
    echo $bici->getKilometros();
    echo $coche->getKilometros();
    echo Vehiculo::getKmTotales();
    echo Vehiculo::getVehiculosCreados();
?>
<?php
    include_once 'Empleado.php';

    $empleado1 = new Empleado("Adrian", 3001);
    $empleado2 = new Empleado("Maria", 2000);

    $empleado1 -> impuestos();
    $empleado2 -> impuestos();
    $empleado2 -> asigna("Maria", 4000);
    $empleado2 -> impuestos();
?>
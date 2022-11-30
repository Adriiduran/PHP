<?php 
    include_once 'Zona.php';

    if (isset($_GET["zona"])) {
        $zona = $_GET["zona"];
        $entradas = $_GET["entradas"];

        echo Zona::venta($zona,$entradas);
        header('Refresh: 3 url=Prueba.php');
    }
?>
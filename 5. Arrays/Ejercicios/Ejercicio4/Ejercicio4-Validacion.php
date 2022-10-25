<?php 
    if ($_GET['oculto'] == "") {
        $array = array();
    }
    else{
        $arrayCadena = $_GET['oculto'];
        $array = unserialize(base64_decode($arrayCadena));
    }
    array_pop($_GET);
    $array[] = $_GET;
    $arrayCadena = base64_encode(serialize($array));
    header("Location:Ejercicio4.php?array=".$arrayCadena."");
?>
<?php
$array = unserialize($_GET['array']);
$posicion = $_GET['posicion'];

for ($i = 0; $i < 100; $i++) {
    if ($i == $posicion) {
        if ($array[$i] == 0) {
            echo 'Ha entrado';
            $array[$i] = 1;
        } else {
            $array[$i] = 0;
        }
    }
}

header('location:./Ejercicio1.php?array=' . serialize($array) . '');

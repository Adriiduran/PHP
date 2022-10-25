<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <?php
    /*Intercambiar un string dado, hasta volverlo a su forma original:
    ejemplo: Hola, ahol, laho, olah, hola (stop).*/

    $array = array('h','o','l','a');

    for ($i=0; $i < 5; $i++) { 
        foreach ($array as $key) {
            echo $key;
        }
        echo ' ';
        array_unshift($array, array_pop($array)); //rota los elementos del array a la izquierda una posición cada vez
    }   
    ?>
</body>

</html>
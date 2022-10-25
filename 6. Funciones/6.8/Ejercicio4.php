<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    <?php
    /*Verificar si un string leído por teclado finaliza con la misma palabra que empieza.*/

    if (isset($_GET['frase'])) {    

        $frase = $_GET['frase'];

        $frase = trim($frase); //elimina los espacios del principio y del final del string

        $arrayPalabras = explode(" ", $frase); //divide el string en array de string 

        if ($arrayPalabras[0] == $arrayPalabras[count($arrayPalabras)-1]) { //comprueba si la primera y la última palabra son iguales
            echo '<h1>LAS PALABRAS SON IGUALES</h1>';
        }
        else{
            echo '<h1>LAS PALABRAS NO SON IGUALES</h1>';

        }
    }
    ?>

    <form action="Ejercicio4.php">
        <label for="frase">Introduzca una frase para comprobar si el texto comienza y acaba con la misma palabra</label>
        <input type="text" name="frase">
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>
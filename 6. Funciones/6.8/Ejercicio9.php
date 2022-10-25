<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejecicio 9</title>
</head>

<body>
    <?php
    /*Pedir al usuario una cadena de caracteres e imprimirla invertida.*/

    if(isset($_GET['frase'])){
        $frase = $_GET['frase'];

        $array = str_split($frase);

        $arrayInvertido = array_reverse($array); //voltea el array

        foreach ($arrayInvertido as $key) {
            echo $key;
        }
    }
    ?>

    <form action="Ejercicio9.php">
        <label for="frase">Introduzca una frase y se la devolveremos invertida</label>
        <input type="text" name="frase" required>
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>
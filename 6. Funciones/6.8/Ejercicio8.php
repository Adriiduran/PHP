<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>
    <?php
    /*Pedir un string al usuario e imprimir todos los números seguidos y sin espacios, correspondientes al código ascii de cada uno de sus caracteres. Posteriormente calcular la frase original a partir de dichos números (usar un array).*/

    if (isset($_GET['frase'])) {
        $frase = $_GET['frase'];

        $arrayCaracteres = str_split($frase);
        $arrayAscii = array();

        foreach ($arrayCaracteres as $caracter) {
            array_push($arrayAscii, ord($caracter)); //convierte un string en su equivalente a codigo ascii en integer

            echo $caracter;
        }

        echo '<br>Frase reconvertida del codigo Ascii <br>';

        foreach ($arrayAscii as $key) {
            echo chr($key); //convierte un integer tomando como referencia el codigo ascii para reconvertirla a string
        }

    }
    ?>

    <form action="Ejercicio8.php">
        <label for="frase">Pasar la frase a codigo ascii</label>
        <input type="text" name="frase" required>
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>
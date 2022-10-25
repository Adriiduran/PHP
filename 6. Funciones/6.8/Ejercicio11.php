<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
</head>

<body>
    <?php
    /*Escribir una clase que lea n caracteres que forman un número romano y que imprima:
    a. si la entrada fue correcta, un string que represente el equivalente decimal
    b. si la entrada fue errónea, un mensaje de error.
    Nota: La entrada será correcta si contiene solo los caracteres M:1000, D:500, C:100, L:50, X:10, I:1. No se tendrá en cuenta el orden solo se sumará el valor de cada letra.*/

    if (isset($_GET['numero'])) {
        $numero = $_GET['numero'];

        $arrayNumero = str_split($numero);
        $bandera = false;

        //comprueba que todos los valores introducidos son correctos
        foreach ($arrayNumero as $key) {
            if ($key != "M" && $key != "D" && $key != "C" && $key != "L" && $key != "X" && $key != "I") {
                $bandera = true;
            }
        }

        if ($bandera == true) {
            echo "ERROR";
        } else {
            $sumatorio = 0;

            //suma cada valor
            foreach ($arrayNumero as $key) {
                if ($key == "M") {
                    $sumatorio += 1000;
                } else if ($key == "D") {
                    $sumatorio += 500;
                } else if ($key == "C") {
                    $sumatorio += 100;
                } else if ($key == "L") {
                    $sumatorio += 50;
                } else if ($key == "X") {
                    $sumatorio += 10;
                } else {
                    $sumatorio += 1;
                }
            }

            echo 'El sumatorio de los número romanos introducidos es: '.$sumatorio;
        }
    }
    ?>

    <form action="Ejercicio11.php">
        <label for="frase">Introduce un número romano para pasarlo a decimal</label>
        <input type="text" name="numero">
        <input type="submit" value="Calcular">
    </form>
</body>

</html>
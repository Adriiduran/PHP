<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>

<body>
    <?php
    /*Escribir un programa que dado un texto de un telegrama que termina en punto:
    a. contar la cantidad de palabras que posean más de 10 letras
    b. reportar la cantidad de veces que aparece cada vocal
    c. reportar el porcentaje de espacios en blanco.
    d. Nota: Las palabras están separadas por un espacio en blanco.*/

    if (isset($_GET['texto'])) {

        $arrayProvisional = str_split(trim($_GET['texto']));

        if ($arrayProvisional[count($arrayProvisional) - 1] == ".") {

            $texto = trim($_GET['texto']);

            $texto = strtolower($texto);

            $arrayCaracteres = str_split($texto);

            $caracteresTotales = count($arrayCaracteres);

            $contadores = array(0, 0, 0, 0, 0, 0, 0);

            //cuenta cuantos espacios y vocales tiene el texto
            foreach ($arrayCaracteres as $car) {
                if ($car == " ") {
                    $contadores[0]++;
                } else if ($car == "a") {
                    $contadores[1]++;
                } else if ($car == "e") {
                    $contadores[2]++;
                } else if ($car == "i") {
                    $contadores[3]++;
                } else if ($car == "o") {
                    $contadores[4]++;
                } else if ($car == "u") {
                    $contadores[5]++;
                }
            }

            $arrayPalabras = explode(" ", $texto);
            $arrayComprobacion = array();

            //comprueba cuantas palabras existen con más de 10 caracteres en el texto
            foreach ($arrayPalabras as $pal) {
                $arrayComprobacion = str_split($pal);

                if (count($arrayComprobacion) >= 10 && $arrayComprobacion[count($arrayComprobacion)-1] != ".") {
                    $contadores[6]++;
                }
            }

            echo '<h2>Cantidad de palabras con más de 10 caracteres: '.$contadores[6].'</h2>';
            echo '<h2>Veces que aparece la vocal a: '.$contadores[1].'</h2>';
            echo '<h2>Veces que aparece la vocal e: '.$contadores[2].'</h2>';
            echo '<h2>Veces que aparece la vocal i: '.$contadores[3].'</h2>';
            echo '<h2>Veces que aparece la vocal o: '.$contadores[4].'</h2>';
            echo '<h2>Veces que aparece la vocal u: '.$contadores[5].'</h2>';
            echo '<h2>Porcentaje de espacios dentro del texto introducido: '.round($contadores[0]*100/$caracteresTotales,2).'%</h2>'; //realiza el porcentaje de espacios dentro del texto

        }
        else{
            echo '<h1>EL TEXTO DEBE ACABAR EN PUNTO PARA PODER PROCESARLO</h1>';
        }
    }
    ?>

    <form action="Ejercicio12.php">
        <label for="frase">Introduce un texto terminado en . para realizar la estadistica</label>
        <input type="text" name="texto">
        <input type="submit" value="Calcular">
    </form>
</body>

</html>
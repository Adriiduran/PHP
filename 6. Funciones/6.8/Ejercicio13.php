<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>

<body>
    <?php
    /*Escribir un programa que dado un texto que finaliza en punto, se pide:
        a. la posición inicial de la palabra más larga y su longitud
        b. cuantas palabras con una longitud entre 8 y 16 caracteres poseen más de tres veces la vocal “a”
        Nota:
        1.- Las palabras pueden estar separadas por uno o más espacios en blanco.
        2.- Puede haber varios espacios en blanco antes de la primera palabra y también después de la última.
        3.- Se considera que una palabra finaliza cuando se encuentra un espacio en blanco o un signo de puntuación.*/

    if (isset($_GET['texto'])) {

        $arrayProvisional = str_split(trim($_GET['texto'])); //obtenemos un array de caracteres para comprobar si el texto acaba en .

        if ($arrayProvisional[count($arrayProvisional) - 1] == ".") {

            $texto = trim($_GET['texto']); //obtenemos el texto de la URL y eliminamos los espacios por delante y por detrás
            $palabraMasLarga = array(0, 0, ""); //array que contiene la posición inicial y la logitud resprectivamente de la palabra más larga
            $contadorPalabras = 0; //contador de palabras entre 8 y 16 caracteres con más de tres "a" 

            $texto = strtolower($texto); //convertimos el texto a min para poder comparar los caracteres más facilmente

            $arrayPalabras = explode(" ", $texto); //convertimos el string del usuario en un array de palabras

            //bucle que recorre cada una de las palabras obtenidas en el array
            foreach ($arrayPalabras as $pal) {
                $signo = false;
                $arrayComprobacion = str_split($pal); //separamos por caracteres cada palabra

                //comprobamos si termina con algún signo de puntuación
                if (
                    $arrayComprobacion[count($arrayComprobacion) - 1] == "." || $arrayComprobacion[count($arrayComprobacion) - 1] == "," ||
                    $arrayComprobacion[count($arrayComprobacion) - 1] == ";" || $arrayComprobacion[count($arrayComprobacion) - 1] == ":" ||
                    $arrayComprobacion[count($arrayComprobacion) - 1] == "!" || $arrayComprobacion[count($arrayComprobacion) - 1] == "¡" ||
                    $arrayComprobacion[count($arrayComprobacion) - 1] == "¿" || $arrayComprobacion[count($arrayComprobacion) - 1] == "?"
                ) {

                    $contadorLongitud = count($arrayComprobacion) - 1; //restamos el signo de puntuación
                    $signo = true;
                } else {
                    $contadorLongitud = count($arrayComprobacion);
                }

                //reemplaza la palabra más larga en caso de que la hubiera
                if ($contadorLongitud > $palabraMasLarga[0]) {
                    $palabraMasLarga[0] = $contadorLongitud;
                    $palabraMasLarga[1] = strrpos($texto, $pal);

                    if ($signo == true) {
                        $palabraMasLarga[2] = str_replace($arrayComprobacion[count($arrayComprobacion)-1],"",$pal);
                    }
                    else{
                        $palabraMasLarga[2] = $pal;
                    }
                }

                if ($contadorLongitud >= 8 && $contadorLongitud <= 16) {
                    $contadorA = 0;

                    foreach ($arrayComprobacion as $car) {
                        if ($car == "a") {
                            $contadorA++;
                        }
                    }

                    if ($contadorA > 3) {
                        $contadorPalabras++;
                    }
                }
            }

            echo '<h2>La palabra más larga encontrada en el texto es: ' . $palabraMasLarga[2] . ' con la posición incial de ' . $palabraMasLarga[1] . ' y con una longitud de ' . $palabraMasLarga[0] . '</h2>';
            echo '<h2>Palabras con una longitud entre 8 y 16 caracteres poseen más de tres veces la vocal “a”: ' . $contadorPalabras . '</h2>';
        } else {
            echo '<h1>EL TEXTO DEBE ACABAR EN PUNTO PARA PODER PROCESARLO</h1>';
        }
    }
    ?>

    <form action="Ejercicio13.php">
        <label for="frase">Introduce un texto terminado en . para realizar la estadistica</label>
        <input type="text" name="texto">
        <input type="submit" value="Calcular">
    </form>
</body>

</html>
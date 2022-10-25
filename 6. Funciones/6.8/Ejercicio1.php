<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php 
        /*Imprimir carácter por carácter un string dado, cada uno en una línea distinta.*/

        $texto = "Hola esto es una texto de prueba";

        $arrayCaracteres = str_split($texto); //divide el string dado en caracteres

        foreach ($arrayCaracteres as $key) { //bucle que recorre el array de caracteres
            echo $key.'<br>';
        }
    ?>
</body>
</html>
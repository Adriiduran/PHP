<?php
/*Realiza un programa que escoja al azar 5 palabras en inglés de un mini-diccionario. El programa pedirá que el usuario teclee la traducción al español de cada una de las palabras y comprobará si son correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas. La aplicación debe tener una opción para introducir los pares de palabras (inglés - español) que se deben guardar en cookies; de esta forma, si de vez en cuando se dan de alta nuevas palabras, la aplicación puede llegar a contar con un número considerable de entradas en el mini-diccionario.*/

if (!isset($_COOKIE['diccionario'])) {
    $diccionario = array(
        array('hola', 'hello'),
        array('adios', 'bye'),
        array('perro', 'dog'),
        array('gato', 'cat'),
        array('casa', 'house'),
        array('coche', 'car'),
        array('raton', 'mouse'),
        array('teclado', 'keyboard'),
        array('ventana', 'window'),
        array('programa', 'program')
    );

    setcookie('diccionario', base64_encode(serialize($diccionario)), time() + (3600 * 24));
    header('Refresh: 0 url=./Ejercicio8.php');
}


if (isset($_GET['español'])) {
    $español = $_GET['español'];
    $ingles = $_GET['ingles'];
    $palabras = unserialize(base64_decode($_COOKIE['diccionario']));

    array_push($palabras,array($español, $ingles));

    setcookie('diccionario', base64_encode(serialize($palabras)), time() + (3600 * 24));
}
?>

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
    $palabras = unserialize(base64_decode($_COOKIE['diccionario']));

    if (!isset($_GET['palabra0'])) {
        $aleatorios = array(
            rand(0, count($palabras) - 1),
            rand(0, count($palabras) - 1),
            rand(0, count($palabras) - 1),
            rand(0, count($palabras) - 1),
            rand(0, count($palabras) - 1)
        );

        echo '  <form action="./Ejercicio8.php">';

        for ($i = 0; $i < 5; $i++) {
            echo '<label>Traduce la palabra "' . $palabras[$aleatorios[$i]][1] . '"</label><br>
                        <input type="text" name="palabra' . $i . '" required><br>';
        }

        echo '<input type="hidden" name="aleatorios" value="' . serialize($aleatorios) . '">';

        echo '<input type="submit" value="Enviar"></form>';
    } else {
        $aleatorios = unserialize($_GET['aleatorios']);
        $aciertos = 0;

        for ($i = 0; $i < 5; $i++) {
            if ($_GET['palabra' . $i] == $palabras[$aleatorios[$i]][0]) {
                $aciertos++;
            }
        }

        echo '<h1>HAS ACERTADO ' . $aciertos . ' PALABRAS</h1>';

        echo '    <form action="./Ejercicio8.php">
                    <label for="">Introduce la palabra en castellano</label>
                    <input type="text" name="español">
                    <label for="">Introduce la palabra en inglés</label>
                    <input type="text" name="ingles">
                    <input type="submit" value="Enviar">
                </form>

                <br>

                <a href="./Ejercicio8.php">No introducir ninguna palabra</a>';
    }
    ?>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <?php
    /*Contar cuantas palabras tiene una frase introducida por el usuario, ten en cuenta que el usuario puede poner varios espacios seguidos, incluso al principio o al final.*/

    var_dump($_REQUEST);

    if (isset($_GET['frase'])) {

        $frase = $_GET['frase'];

        $numeroPalabras = str_word_count($frase); //función que cuenta las palabras

        echo '<h1>La frase introducida contiene: '.$numeroPalabras.' palabras</h1>';
    }

    ?>

    <form action="Ejercicio3.php">
        <label for="frase">Introduzca una frase para contar las palabras que la componen</label>
        <input type="text" name="frase">
        <input type="submit" value="Contar">
    </form>
</body>

</html>
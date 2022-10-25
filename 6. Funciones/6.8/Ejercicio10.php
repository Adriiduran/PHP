<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>

<body>
    <?php
    /*Escribir un programa que pida un nombre (con sus apellidos) y escriba en pantalla tanto el nombre con las primeras letras en mayúsculas como las iniciales de dicho nombre.*/

    if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];

        $nombre = strtolower($nombre); //pasa el texto a minúsculas

        $arrayPalabras = explode(" ", $nombre);
        $arrayIniciales = array();

        echo 'Nombre completo: ';

        foreach ($arrayPalabras as $key) {
            $key = ucfirst($key); //convierte la primera letra de cada key a mayuscula para darle el formato deseado
            array_push($arrayIniciales, substr(ucfirst($key),0,1)); //pasamos cada inicial a un array
            echo $key.' ';
        }

        echo 'inciales: ';

        //recorremos y mostramos cada inicial
        foreach ($arrayIniciales as $key) {
            echo $key;
        }
    }


    ?>

    <form action="Ejercicio10.php">
        <label for="nombre">Introduzca su nombre con sus apellidos</label>
        <input type="text" name="nombre" required>
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>
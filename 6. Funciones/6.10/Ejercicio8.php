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
    /*Pedir la fecha de nacimiento y el nombre de dos personas y mostrar la edad de cada una, así como el nombre de la persona mayor.*/

    if (isset($_GET['nombre1'],$_GET['nombre2'],$_GET['nacimiento1'],$_GET['nacimiento2'])) {
        $nombre1 = $_GET['nombre1'];
        $nombre2 = $_GET['nombre2'];
        $nacimiento1 = $_GET['nacimiento1'];
        $nacimiento2 = $_GET['nacimiento2'];

        $diferenciaSegundos1 = strtotime("now") - strtotime($nacimiento1);
        $edad1 = round($diferenciaSegundos1 / (60*60*24*365.25));

        $diferenciaSegundos2 = strtotime("now") - strtotime($nacimiento2);
        $edad2 = round($diferenciaSegundos2 / (60*60*24*365.25));

        echo '<h1> PERSONA 1: Nombre: '.$nombre1.' Edad: '.$edad1.'</h1>';
        echo '<h1> PERSONA 2: Nombre: '.$nombre2.' Edad: '.$edad2.'</h1>';

        if ($edad1 > $edad2) {
            echo 'La persona 1 es mayor que la segunda';
        }
        else{
            echo 'La persona 2 es mayor que la primera';
        }

        echo '<br>';
    }

    ?>

    <form action="./Ejercicio8.php" method="get">
        <label for="">Introduce el nombre de la persona 1</label>
        <input type="text" name="nombre1" required>
        <br>
        <label for="nacimiento">Introduce la fecha de nacimiento de la persona 1</label>
        <input type="date" name="nacimiento1" required>
        <br>
        <label for="">Introduce el nombre de la persona 2</label>
        <input type="text" name="nombre2" required>
        <br>
        <label for="nacimiento">Introduce la fecha de nacimiento de la persona 2</label>
        <input type="date" name="nacimiento2" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<body>
    <?php
    /*Pedir al usuario su fecha de nacimiento y una fecha futura, y mostrar la edad que tendrá en esa fecha (un año tiene 60*60*24*365.25 segundos)*/

    if (isset($_GET['nacimiento'],$_GET['futuro'])) {
        $nacimiento = $_GET['nacimiento'];
        $futuro = $_GET['futuro'];
        $diferencia = strtotime($futuro) - strtotime($nacimiento);
        $año = round($diferencia / (60*60*24*365.25));

        echo '<h1>'.$año.' años</h1>';
    } 
    ?>

    <form action="./Ejercicio7.php" method="get">
        <label for="nacimiento">Introduce tu fecha de nacimiento</label>
        <input type="date" name="nacimiento" required>
        <br>
        <label for="futuro">Introduce una fecha futura para comprobar cuantos años tendras en la fecha seleccionada</label>
        <input type="date" name="futuro" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
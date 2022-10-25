<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericico 5</title>
</head>

<body>
    <?php
    /*Pedir un día de la semana en un formulario, seleccionándolo desde una lista desplegable. Mostrar la fecha correspondiente al próximo día de la semana elegido por el usuario.*/

    if (isset($_GET['dia'])) {
        $dia = $_GET['dia'];

        echo date("d/m/Y",strtotime("next ".$dia));
    }
    ?>

    <form action="Ejercicio5.php">
        <select name="dia">
            <option value="Monday" name="lunes">Lunes</option>
            <option value="Tuesday" name="martes">Martes</option>
            <option value="Wednesday" name="miercoles">Miercoles</option>
            <option value="Thursday" name="jueves">Jueves</option>
            <option value="Friday" name="viernes">Viernes</option>
            <option value="Saturday" name="sabado">Sabado</option>
            <option value="Sunday" name="domingo">Domingo</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
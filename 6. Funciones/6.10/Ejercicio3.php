<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericio 3</title>
</head>

<body>
    <?php
    /*Pedir una fecha en un formulario con un input de fecha y mostrar a que día de la semana corresponde (en español).*/

    if (isset($_GET['fecha'])) {
        $dia = date("w",strtotime($_GET['fecha']));

        if ($dia == 0) {
            $diaSemana = 'domingo';
        }
        else if ($dia == 1) {
            $diaSemana = 'Lunes';
        }
        else if ($dia == 2) {
            $diaSemana = "Martes";
        }
        else if ($dia == 3) {
            $diaSemana = 'Miercoles';
        }
        else if ($dia == 4) {
            $diaSemana = 'Jueves';
        }
        else if ($dia == 5) {
            $diaSemana = 'Viernes';
        }
        else{
            $diaSemana = 'Sabado';
        }

        echo $diaSemana;
    }
    ?>

    <h1>Pedir una fecha en un formulario con un input de fecha y mostrar a que día de la semana corresponde (en español).</h1>

    <form action="Ejercicio3.php" method="get">
        <input type="date" name="fecha" required>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
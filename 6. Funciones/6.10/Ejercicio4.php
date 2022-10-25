<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    <?php
    /*Pedir una fecha en un formulario con un input de fecha y mostrarla en el formato “12 de Enero de 2018” (en español).*/

    if (isset($_GET['fecha'])) {
        $fecha = $_GET['fecha'];

        $arrayFecha = explode("-", $fecha);

        $mes = strval($arrayFecha[1]);

        switch ($mes) {
            case '01':
                $mes = 'Enero';
                break;
            case '02':
                $mes = 'Febrero';
                break;
            case '03':
                $mes = 'Marzo';
                break;
            case '04':
                $mes = 'Abril';
                break;
            case '05':
                $mes = 'Mayo';
                break;
            case '06':
                $mes = 'Junio';
                break;
            case '07':
                $mes = 'Julio';
                break;
            case '08':
                $mes = 'Agosto';
                break;
            case '09':
                $mes = 'Septiembre';
                break;
            case '10':
                $mes = 'Octubre';
                break;
            case '11':
                $mes = 'Noviembre';
                break;
            case '12':
                $mes = 'Diciembre';
                break;
            default:
                $mes = 'Non';
                break;
        }


        echo $arrayFecha[2].' de '.$mes.' de '.$arrayFecha[0]; 
    }

    ?>

    <h1>Pedir una fecha en un formulario con un input de fecha y mostrarla en el formato “12 de Enero de 2018” (en español).</h1>

    <form action="Ejercicio4.php" method="get">
        <input type="date" name="fecha" required>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
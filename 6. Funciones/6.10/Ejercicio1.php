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
    /*Crea un formulario donde el usuario introduce una fecha a través de 3 cajas de texto, si no es correcta se debe indicar en un mensaje; si es correcta se debe mostrar en el formato elegido. Crea una lista desplegable con todas las posibilidades de formato que se te ocurran.*/

    if (isset($_GET['dia'],$_GET['mes'],$_GET['año'])) {

        $dia = $_GET['dia'];
        $mes = $_GET['mes'];
        $año = $_GET['año'];

        if (($dia <= 31 && $mes == 1) || ($dia <= 28 && $mes == 2) || ($dia <= 31 && $mes == 3) || ($dia <= 30 && $mes == 4) || ($dia <= 31 && $mes == 5) && ($dia <= 30 && $mes == 6) || ($dia <= 31 && $mes == 7) || ($dia <= 30 && $mes == 8) || ($dia <= 31 && $mes == 9) || ($dia <= 30 && $mes == 10) || ($dia <= 31 && $mes == 11) || ($dia <= 30 && $mes == 12)) {

            $formato = $_GET['formato'];

            if ($formato = "mesDiaAmer") {
                echo '<h1>'.$mes.'/'.$dia.'</h1>';
            }
            else if ($formato = "mesDiaAñoAmer") {
                echo '<h1>'.$mes.'/'.$dia.'/'.$año.'</h1>';
            }
            else{
                echo '<h1>'.$mes.'-'.$dia.'-'.$año.'</h1>';
            }
        }
        else{
            echo '<h1>SE HA INTRODUCIDO UNA FECHA INCORRECTO COMPRUEBE DE NUEVO LOS DATOS INTRODUCIDOS</h1>';

        }
    }

    ?>

    <form action="./Ejercicio1.php" method="get">
        <label for="">Dia</label>
        <input type="number" name="dia" required min="1" max="31">

        <label for="">Mes</label>
        <input type="number" name="mes" required min="1" max="12">

        <label for="">Año</label>
        <input type="number" name="año" required min="0">
        <select name="formato">
            <option value="mesDiaAmer" selected>Mes y Día Americano</option>
            <option value="mesDiaAñoAmer">Mes, Día y Año Americano</option>
            <option value="guion">Año de cuatro dígitos, mes y día con guiones</option>
        </select>
        <input type="submit" value="ENVIAR">
    </form>
</body>

</html>
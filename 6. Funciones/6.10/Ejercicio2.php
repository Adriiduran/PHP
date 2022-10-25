<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <?php
    /*Realiza un ejercicio similar al anterior, pero para la hora.*/

    if (isset($_GET['hora'], $_GET['minuto'], $_GET['segundo'], $_GET['formato'])) {

        $hora = $_GET['hora'];
        $min = $_GET['minuto'];
        $seg = $_GET['segundo'];
        $formato = $_GET['formato'];

        if ($formato = "horMinSeg") {
            echo '<h1>' . $hora . ':' . $min . ':' . $seg . '</h1>';
        }
        else {
            echo '<h1>' . $seg . ':' . $min . ':' . $hora . '</h1>';
        }
    }
    ?>

    <form action="./Ejercicio2.php" method="get">
        <label for="">Horas</label>
        <input type="number" name="hora" required min="0" max="23">

        <label for="">Minutos</label>
        <input type="number" name="minuto" required min="0" max="59">

        <label for="">Segundos</label>
        <input type="number" name="segundo" required min="0" max="59">
        <select name="formato">
            <option value="horMinSeg" selected>Hora minutos y segundos</option>
            <option value="segMinHor">Segundos, minutos y horas</option>
        </select>
        <input type="submit" value="ENVIAR">
    </form>
</body>

</html>
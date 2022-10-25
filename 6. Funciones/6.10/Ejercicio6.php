<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php 
    /*Mostrar el día de la semana que correspondería, una vez transcurridos un número de años, meses, y días elegidos por el usuario, a partir de la fecha actual.*/

    if (isset($_GET['year'],$_GET['month'],$_GET['day'])) {
        $year = $_GET['year'];
        $month = $_GET['month'];
        $day = $_GET['day'];

        echo date("d/m/Y",strtotime("+".$year." years ".$month." months ".$day." days"));
    }

    ?>

    <form action="./Ejercicio6.php" method="get">
        <label for="year">Introduce un número de años para sumar</label>
        <input type="number" name="year" required min="0">
        <br>
        <label for="year">Introduce un número de meses para sumar</label>
        <input type="number" name="month" required min="0">
        <br>
        <label for="year">Introduce un número de días para sumar</label>
        <input type="number" name="day" required min="0">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
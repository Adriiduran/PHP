<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <style>
        img {
            height: 50px;
            width: 50px;
        }
    </style>
</head>

<body>
    <?php
    /*bucles anidados para la creación de la tabla*/
    for ($i = 0; $i < 10; $i++) {
        if ($i == 0) {
            echo '<table>';
        }

        for ($j = 0; $j < 10; $j++) {
            
            if ($i == 1 && $j == 1) {
                echo '<td><a href="./Ejercicio5-Validacion.php?correcto=0"><img src="./images/ojoCerrado.jpg"></a></td>';
            }
            else if ($j == 0){
                echo '<tr><td><a href="./Ejercicio5-Validacion.php?correcto=1"><img src="./images/ojoCerrado.jpg"></a></td>';
            }
            else if ($j == 9){
                echo '<td><a href="./Ejercicio5-Validacion.php?correcto=1"><img src="./images/ojoCerrado.jpg"></a></td></tr>';
            }
            else {
                echo '<td><a href="./Ejercicio5-Validacion.php?correcto=1"><img src="./images/ojoCerrado.jpg"></a></td>';
            }

        }
        if ($i == 9) {
            echo "</table>";
        }
    }
    ?>
</body>

</html>
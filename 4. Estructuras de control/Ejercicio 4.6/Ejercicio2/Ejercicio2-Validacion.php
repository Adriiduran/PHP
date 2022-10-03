<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /*Creación de números aleatorios*/
    $num1 = rand(1, 50);
    $num2 = rand(1, 50);
    $num3 = rand(1, 50);
    $num4 = rand(1, 50);
    $num5 = rand(1, 50);
    $num6 = rand(1, 50);
    $serie = rand(1, 999);

    /*Muestra los números ganadores*/
    echo '<table border="1"><tr>';
    echo "<td>Numero 1: " . $num1 . "</td>";
    echo "<td>Numero 2: " . $num2 . "</td>";
    echo "<td>Numero 3: " . $num3 . "</td>";
    echo "<td>Numero 4: " . $num4 . "</td>";
    echo "<td>Numero 5: " . $num5 . "</td>";
    echo "<td>Numero 6: " . $num6 . "</td>";
    echo "<td>Serie: " . $serie . "</td>";
    echo "</tr></table>";



    if (isset($_REQUEST["submit"])) {

        $aciertos = 0;
        $dinero = 0;

        /*Comprueba cuantos aciertos a obtenido el usuario*/
        for ($i = 1; $i < 50; $i++) {
            if (isset($_REQUEST["$i"])) {
                if ($_REQUEST["$i"] == $num1 || $_REQUEST["$i"] == $num2 || $_REQUEST["$i"] == $num3 || $_REQUEST["$i"] == $num4 || $_REQUEST["$i"] == $num5 || $_REQUEST["$i"] == $num6) {
                    $aciertos++;
                }
            }
        }

        /*Comprueba si el usuario a acertado el número de serie*/
        if ($serie == $_REQUEST["serie"]) {
            $dinero = 500;
        }

        if ($aciertos == 5) {
            $dinero += 30;
        } else if ($dinero == 6) {
            $dinero += 100;
        }

        echo "Has acertado: " . $aciertos . " y has ganado: " . $dinero . " euros";
    }
    ?>
</body>

</html>
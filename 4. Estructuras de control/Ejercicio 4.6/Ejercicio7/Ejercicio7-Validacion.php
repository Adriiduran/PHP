<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .negro {
            background-color: black;
            color: white;
        }

        .gris {
            background-color: grey;
            color: white;
        }

        .rojo {
            background-color: red;
            color: white;
        }

        .verde {
            background-color: green;
            color: white;
        }

        table,
        tr,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php

    $eleccion = 0;

    for ($i = 1; $i <= 50; $i++) {
        if (isset($_REQUEST["$i"])) {
            $eleccion++;
        }
    }

    if ($eleccion <= 6) {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        $num3 = rand(1, 50);
        $num4 = rand(1, 50);
        $num5 = rand(1, 50);
        $num6 = rand(1, 50);
        $serie = rand(1, 999);

        echo '<table>';

        $variable = 0;

        for ($i = 1; $i <= 50; $i++) {

            if ($variable == 0) {
                echo "<tr>";
            }

            if (isset($_REQUEST["$i"])) {
                if ($_REQUEST["$i"] == $num1 || $_REQUEST["$i"] == $num2 || $_REQUEST["$i"] == $num3 || $_REQUEST["$i"] == $num4 || $_REQUEST["$i"] == $num5 || $_REQUEST["$i"] == $num6) {
                    echo '<td class="verde"><input type="checkbox">' . $i . '</td>';
                } else if ($_REQUEST["$i"] != $num1 && $_REQUEST["$i"] != $num2 && $_REQUEST["$i"] != $num3 && $_REQUEST["$i"] != $num4 && $_REQUEST["$i"] != $num5 && $_REQUEST["$i"] != $num6) {
                    echo '<td class="negro"><input type="checkbox">' . $i . '</td>';
                }
            } else {
                if ($i == $num1 || $i == $num2 || $i == $num3 || $i == $num4 || $i == $num5 || $i == $num6) {
                    echo '<td class="rojo"><input type="checkbox">' . $i . '</td>';
                } else {
                    echo '<td class="gris"><input type="checkbox">' . $i . '</td>';
                }
            }

            $variable++;

            if ($variable == 10) {
                echo "</tr>";
                $variable = 1;
            }
        }

        echo '</table>';

        if (isset($_REQUEST["submit"])) {

            $aciertos = 0;
            $dinero = 0;

            for ($i = 1; $i < 50; $i++) {
                if (isset($_REQUEST["$i"])) {
                    if ($_REQUEST["$i"] == $num1 || $_REQUEST["$i"] == $num2 || $_REQUEST["$i"] == $num3 || $_REQUEST["$i"] == $num4 || $_REQUEST["$i"] == $num5 || $_REQUEST["$i"] == $num6) {
                        $aciertos++;
                    }
                }
            }

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
    } else {
        echo 'Has seleccionado más de 6 casillas para apostar en la primitiva';
        header ("Refresh:2; url=./Ejercicio7.php");
    }
    ?>
</body>

</html>
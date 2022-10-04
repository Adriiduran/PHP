<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <form action="./Ejercicio2-Validacion.php" method="post">

        <table>
            <?php
            $variable = 0;
            /*Creación de tabla con bucle*/
            for ($i = 1; $i <= 50; $i++) {

                if ($variable == 0) {
                    echo "<tr>";
                }

                echo '<td><input type="checkbox" value="' . $i . '" name="' . $i . '">'.$i.'</td>';
                $variable++;

                if ($variable == 10) {
                    echo "</tr>";
                    $variable = 0;
                }
            }
            ?>
        </table>
        <label for="serie">Introduce nº serie</label>
        <input type="number" name="serie" max="999" min="1">
        <button type="submit" name="submit">Enviar</button>
    </form>
</body>

</html>
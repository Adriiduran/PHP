<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA</title>
</head>

<body>
    <?php
    //Incio de la sesión
    session_start();
    $sesionCoches = $_SESSION['sesionCoches'];

    $categoria = 'turismo';

    echo '<table border="1">
            <tr>
                <th>MATRÍCULA</th><th>FECHA</th><th>MARCA</th><th>TIPO</th><th>EXTRAS</th>
            </tr>    
        ';

    foreach ($sesionCoches as $key => $value) {
        for ($i=0; $i < count($value); $i++) { 
            if ($categoria == $value[$i][2]) {
                echo '<td>' . $key . '</td>';
                for ($k = 0; $k < count($value); $k++) {
                    echo '<td>' . date('l - d/m/Y', $value[$k][0]) . '</td>';
                    echo '<td>' . $value[$k][1] . '</td>';
                    echo '<td>' . $value[$k][2] . '</td>';
    
                    if (count($value[$i][3]) != 0) {
                        echo '<td>';
                        for ($j = 0; $j < count($value[$i][3][0]); $j++) {
                            echo '-' . $value[$i][3][0][$j] . '<br>';
                        }
                        echo '</td></tr>';
                    } else {
                        echo '</tr>';
                    }
                }
            }
        }
    }

    echo '</table>';

    echo '<a href="./index.php">Volver</a>';
    ?>
</body>

</html>
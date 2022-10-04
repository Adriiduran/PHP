<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
</head>
<style>
    table {
        background: url("./messi.webp") no-repeat;
        background-size: 100%;
    }

    td {
        border: 1px solid black;
    }

    td {
        width: 45px;
        height: 45px;
    }

    .opaco {
        background-color: black;
    }

    .relleno {
        height: 100%;
        width: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
        background: darkslategrey;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #4caf50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .contenedor {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        text-align: center;
        margin-left: 100px;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="text"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }
</style>

<body>
    <?php
    if (isset($_GET['intentos'])) {
        $intentos = $_GET['intentos'];
    } else {
        $intentos = 10;
    }

    if ($intentos == -1) {
        header('Location:./Ejercicio3-IntentosSuperados.php');
    } else {
        if (isset($_GET['array'])) {
            $array = unserialize(base64_decode($_GET['array']));
        } else {
            $array = array();

            for ($i = 0; $i < 10; $i++) {
                for ($j = 0; $j < 10; $j++) {
                    $array[$i][$j] = 0;
                }
            }
        }

        for ($i = 0; $i < 10; $i++) {
            if ($i == 0) {
                echo '<table>';
            }

            for ($j = 0; $j < 10; $j++) {

                if ($j == 0) {
                    echo '<tr>';
                }

                if ($array[$i][$j] == 0) {
                    $estilo = 'class="opaco"';
                } else {
                    $estilo = '';
                }

                echo '<td ' . $estilo . '><a href="./Ejercicio3-Validacion.php?array=' . base64_encode(serialize($array)) . '&intentos=' . $intentos . '&i=' . $i . '&j=' . $j . '"><div class="relleno"></div></a></td>';


                if ($j == 9) {
                    echo '</tr>';
                }
            }
            if ($i == 9) {
                echo "</table>";
            }
        }

        echo '<div class="contenedor"><form action="./Ejercicio3-Validacion.php" method="get">
        <label for="fusuario">Introduce tu respuesta</label><br>
        <input type="text" name="usuario" required="required">
        <input type="submit" value="Enviar">
        <input type="hidden" name="intentos" value="'.$intentos.'">
        <input type="hidden" name="array" value="'.base64_encode(serialize($array)).'">
        <h3>Intentos restantes: ' . $intentos . '</h3>
        </form></div>';
    }
    ?>
</body>

</html>
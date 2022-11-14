<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>

<body>
    <?php
    //Creación de cookie
    if (!isset($_COOKIE['cookieCoches'])) {
        setcookie('cookieCoches', base64_decode(serialize(array())), time() + (86400 * 24 * 365), "/");
        header('Refresh: 0 url=./index.php');
    } else {
        $cookieCoches = unserialize(base64_decode($_COOKIE['cookieCoches']));
    }

    //Deseralización y declaración en variable


    //Incio de la sesión
    session_start();
    $_SESSION['sesionCoches'] = $cookieCoches;
    $sesionCoches = $_SESSION['sesionCoches'];

    //Creación de array predeterminados
    $arrayCategorias = ['turismo', 'berlina', 'monovolumen', 'deportivo', 'furgoneta'];
    $arrayExtras = ['camara trasera', 'llantas de aleación', 'climatizador'];

    //Añadir coches al array para almacenarlos
    if (isset($_GET['marca'])) {
        $marca = $_GET['marca'];
        $categoria = $_GET['categoria'];
        $tiempo = time();
        $matricula = strval(rand(100, 999)) . '-' . strtoupper(substr($marca, -3));
        $arrayExtrasIns = [];

        if (isset($_GET['camara'])) {
            array_push($arrayExtrasIns, $_GET['camara']);
        }

        if (isset($_GET['llantas'])) {
            array_push($arrayExtrasIns, $_GET['llantas']);
        }

        if (isset($_GET['climatizador'])) {
            array_push($arrayExtrasIns, $_GET['climatizador']);
        }

        $sesionCoches['' . $matricula . ''] = array();

        array_push($sesionCoches['' . $matricula . ''], array($tiempo, $marca, $categoria, array($arrayExtrasIns)));
        setcookie('cookieCoches', base64_encode(serialize($sesionCoches)), time() + (86400 * 24 * 365), "/");
    }

    if (isset($_GET['extra'])) {
        $posicion = $_GET['posicion'];
        $extra = $_GET['extra'];

        array_push($sesionCoches['' . $posicion . ''][0][3][0], $extra);
        setcookie('cookieCoches', base64_encode(serialize($sesionCoches)), time() + (86400 * 24 * 365), "/");
    }

    if (isset($_GET['borrar'])) {
        setcookie('cookieCoches', '', time() + ((86400 * 24 * 365)), "/");
        $sesionCoches = array();
    }

    // print_r($sesionCoches);
    ?>

    <form action="#">
        <label for="">MARCA:</label>
        <input type="text" name="marca" required>
        <?php
        echo '<select name="categoria">';
        for ($i = 0; $i < count($arrayCategorias); $i++) {
            echo '<option value="' . $arrayCategorias[$i] . '">' . $arrayCategorias[$i] . '</option>';
        }
        echo '</select>';
        ?>
        <br>
        <label for="">Extras:</label><br>
        <input type="checkbox" name="camara" value="camara">
        <label for="">Cámara Trasera</label><br>
        <input type="checkbox" name="llantas" value="llantas">
        <label for="">LLantas de aleación</label><br>
        <input type="checkbox" name="climatizador" value="climatizador">
        <label for="">Climatizador</label><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    echo '<table border="1">
            <tr>
                <th>MATRÍCULA</th><th>FECHA</th><th>MARCA</th><th>TIPO</th><th>EXTRAS</th><th></th>
            </tr>    
        ';

    foreach ($sesionCoches as $key => $value) {
        echo '<td>' . $key . '</td>';

        for ($i = 0; $i < count($value); $i++) {
            echo '<td>' . date('l - d/m/Y', $value[$i][0]) . '</td>';
            echo '<td>' . $value[$i][1] . '</td>';
            echo '<td>' . $value[$i][2] . '</td>';

            if (count($value[$i][3]) != 0) {
                echo '<td>';
                for ($j = 0; $j < count($value[$i][3][0]); $j++) {
                    echo '-' . $value[$i][3][0][$j] . '<br>';
                }
                echo '</td>';
            }
        }
        echo '<td><form action="./index.php">
        <input type="text" name="extra">
        <input type="submit" value="Añadir Extra">
        <input type="hidden" name="posicion" value="' . $key . '">
        </form></td><tr>';
    }

    echo '</table></form>';

    echo '<p>Selecciona una categoria para ver los coches</p><br>';
    ?>

    <form action="consulta.php">
        <select name="categoria">
            <?php
            for ($i = 0; $i < count($arrayCategorias); $i++) {
                echo '<option value="' . $arrayCategorias[$i] . '">' . $arrayCategorias[$i] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="consulta">
    </form>

    <a href="./index.php?borrar=">BORRAR TODOS LOS COCHES</a>
</body>

</html>
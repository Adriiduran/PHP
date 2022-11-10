<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTADO DE ANIMALES POR FECHAS</title>
</head>

<body>
    <?php
    //Inicia la sesión
    session_start();
    if (!isset($_SESSION['sesion'])) {
        $_SESSION['sesion'] = [];
    }

    if (isset($_GET['fecha'])) {
        $fecha = $_GET['fecha'];
        $obtener = false;

        foreach (file("mascotas.txt") as $line) {
            $line = trim($line);
            if ($obtener == true) {
                if (substr($line, 0, 1) != '#') {
                    $array = explode('-', $line);
                    $_SESSION['sesion']['' . $array[0] . ''] = array();
                    array_push($_SESSION['sesion']['' . $array[0] . ''], array($array[1], $array[2]));
                }
                else{
                    $obtener = false;
                }
            }
            if ($fecha == $line) {
                $obtener = true;
            }
        }
    }

    print_r($_SESSION['sesion']);

    if ($_SESSION['sesion'] != []) {
        echo '<table border="1">';
        echo '<tr><th>Nombre</th><th>Tipo</th><th>Edad</th></tr>';
        foreach ($_SESSION['sesion'] as $key => $value) {
            echo '<tr>';
            echo '<td>' . $key . '</td><td>' . $value[0][0] . '</td><td>' . $value[0][1] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    echo '<h1>SELECTOR DE FECHAS</h1>';

    echo '<form action="#"><select name="fecha">';

    foreach (file("mascotas.txt") as $line) {
        $line = trim($line);
        if (substr($line, 0, 1) == '#') {
            echo '<option value="' . $line . '">' . $line . '</option>';
        }
    }

    echo '<input type="submit" value="Listar">
    </form></select>';
    ?>
</body>

</html>
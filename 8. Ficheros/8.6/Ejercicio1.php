<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLINICA VETERINARIA</title>
</head>

<body>
    <?php
    //Inicia la sesión
    session_start();
    if (!isset($_SESSION['sesion'])) {
        $_SESSION['sesion'] = [];
    }

    //Crea el formato de fecha elegido
    $fecha = '#' . date('d-m-Y') . '#';

    //Añade la mascota al array de sesión
    if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];
        $tipo = $_GET['tipo'];
        $edad = $_GET['edad'];

        $_SESSION['sesion']['' . $nombre . ''] = array();

        array_push($_SESSION['sesion']['' . $nombre . ''], array($tipo, $edad));
    }

    if (isset($_GET['grabar'])) {
        $contieneFecha = 0;

        foreach(file("mascotas.txt") as $line) {
            if ($line == $fecha."\n") {
                $contieneFecha = 1;
            }
        }

        echo $contieneFecha;

        $archivo = fopen('./mascotas.txt', 'a+');

        if ($contieneFecha == 0) {
            fwrite($archivo, $fecha."\n");
        }

        foreach ($_SESSION['sesion'] as $key => $value) {
            fwrite($archivo, $key . '-' . $value[0][0] . '-' . $value[0][1]."\n");
        }

        fclose($archivo);

        $_SESSION['sesion'] = [];
    }

    print_r($_SESSION['sesion']);

    //Muestra la tabla con las mascotas añadidas
    echo '<table border="1">';
    echo '<tr><th>Nombre</th><th>Tipo</th><th>Edad</th></tr>';
    foreach ($_SESSION['sesion'] as $key => $value) {
        echo '<tr>';
        echo '<td>' . $key . '</td><td>' . $value[0][0] . '</td><td>' . $value[0][1] . '</td>';
        echo '</tr>';
    }
    echo '</table>'
    ?>

    <form action="#" method="get">
        <label for="">Nombre de la mascota</label>
        <input type="text" name="nombre" required> <br>
        <label for="">Tipo</label>
        <input type="text" name="tipo" required> <br>
        <label for="">Edad</label>
        <input type="number" name="edad" min="1" required> <br>
        <input type="submit" value="Grabar">
    </form>

    <a href="./Ejercicio1.php?grabar=">GRABAR MASCOTAS EN EL ARCHIVO MASCOTAS.TXT</a>
</body>

</html>
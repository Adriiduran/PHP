<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLINICA VETERINARIA</title>
    <style>
        /*NOMALIZE*/
        * {
            box-sizing: border-box;
            padding: 0px;
            margin: 0px;
        }

        body {
            height: 100vh;
        }

        /*DIV PRICIPALES PÁGINA*/

        .container {
            text-align: center;
            width: 20vw;
            margin: 50px auto;
        }

        /*BOTÓN*/

        .boton {
            padding: 15px 25px;
            background-color: black;
            margin: 15px;
            text-decoration: none;
            color: white;
            border: 1px solid black;
            border-radius: 10px;
            display: inline-block;
        }

        /*FORMULARIO*/

        .form {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            width: 40vw;
            margin: 50px auto;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #04aa6d;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
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

    //Comprueba si existe la fecha en el archivo, si no la crea y graba las mascotas
    if (isset($_GET['grabar'])) {
        $contieneFecha = false;

        foreach (file("mascotas.txt") as $line) {
            if (trim($line) == $fecha) {
                $contieneFecha = true;
            }
        }

        $archivo = fopen('./mascotas.txt', 'a+');

        if (!$contieneFecha) {
            fwrite($archivo, $fecha . "\n");
        }

        foreach ($_SESSION['sesion'] as $key => $value) {
            fwrite($archivo, $key . '-' . $value[0][0] . '-' . $value[0][1] . "\n");
        }

        fclose($archivo);

        $_SESSION['sesion'] = [];
    }
    ?>

    <div class="container">
        <form action="#" method="get">
            <label for="">Nombre de la mascota</label>
            <input type="text" name="nombre" required> <br>
            <label for="">Tipo</label>
            <input type="text" name="tipo" required> <br>
            <label for="">Edad</label>
            <input type="number" name="edad" min="1" required> <br> <br>
            <input type="submit" value="Grabar">
        </form>

        <a class="boton" href="./Ejercicio1.php?grabar=">GRABAR MASCOTAS EN EL ARCHIVO MASCOTAS.TXT</a> <br> <br> <br>

    <?php
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
    </div>
</body>

</html>
<?php
if (!isset($_COOKIE['productos2'])) {
    $productos = array(
        array('raton', '6', 'https://m.media-amazon.com/images/I/718VRyryjVS._AC_SS450_.jpg', 'Descripcion personalizada para el raton'),
        array('teclado', '11', 'https://m.media-amazon.com/images/I/611qnhkkDUL._AC_SY355_.jpg', 'Descripcion personalizada para el teclado'),
        array('monitor', '80', 'https://www.lg.com/es/images/monitores/MD06025876/gallery/medium03.jpg', 'Descripcion personalizada para el monitor'),
        array('joystick', '33', 'https://img.joomcdn.net/4eb3b339902f374dd9f4bba09ca63d912d122311_original.jpeg', 'Descripcion personalizada para el joystick')
    );

    setcookie('productos2', base64_encode(serialize($productos)), time() + (3600 * 24), "/");
    header('Refresh: 0 url=./Ejercicio3.php');
} else {
    $productos = unserialize(base64_decode($_COOKIE['productos2']));

    // Inicio de sesión
    session_start();

    //Crea el array carrito por defecto
    if (!isset($_COOKIE['carrito'])) {
        $_SESSION['carrito'] = array();

        for ($i = 0; $i < count($productos); $i++) {
            array_push($_SESSION['carrito'], array($productos[$i][0], 0));
        }
    } else {
        $_SESSION['carrito'] = unserialize(base64_decode($_COOKIE['carrito']));

        $carrito = $_SESSION['carrito'];
    }
}

if (isset($_GET['eliminar'])) {
    $carrito[$_GET['eliminar']][1]--;

    setcookie('carrito', base64_encode(serialize($carrito)), time() + (3600 * 24), "/");

    header('Refresh: 0 url=./Ejercicio3-Carrito.php');
}

if (isset($_GET['vaciar'])) {
    for ($i=0; $i < count($carrito); $i++) { 
        $carrito[$i][1] = 0;
    }

    setcookie('carrito', base64_encode(serialize($carrito)), time() + (3600 * 24), "/");

    header('Refresh: 0 url=./Ejercicio3-Carrito.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="Ejercicio3.css">
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="4">PRODUCTOS EN TU CESTA</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            $unidades = 0;

            for ($i = 0; $i < count($carrito); $i++) {
                if ($carrito[$i][1] != 0) {
                    echo '<tr>
                        <td>' . $carrito[$i][0] . '</td>
                        <td>' . $carrito[$i][1] . '</td>
                        <td><img src="' . $productos[$i][2] . '"></td>
                        <td><a class="boton" href="./Ejercicio3-Carrito.php?eliminar=' . $i . '">Eliminar</a></td>
                    </tr>';

                    $total += ($carrito[$i][1] * $productos[$i][1]);
                    $unidades += $carrito[$i][1];
                }
            }

            echo '<tr>
                        <td>Total</td><td>' . $unidades . '</td><td>' . $total . '</td><td><a class="boton" href="./Ejercicio3-Carrito.php?vaciar=hola">Vaciar la cesta</a></td>
                    </tr>'
            ?>
        </tbody>
    </table>
    <a href="./Ejercicio3.php" class="boton">Volver a la tienda</a>
</body>

</html>
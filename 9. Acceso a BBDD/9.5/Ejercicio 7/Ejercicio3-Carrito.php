<?php
// Inicio de sesión
session_start();

//Obtiene los valores de los productos del fichero productos.txt
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];

    foreach (file('productos.txt') as $linea) {
        trim($linea);
        $array = explode(",", $linea);

        array_push($_SESSION['productos'], array($array[0], $array[1], $array[2], $array[3]));
    }
}

//Crea el array carrito por defecto
if (!isset($_COOKIE['carrito'])) {
    $_SESSION['carrito'] = array();

    for ($i = 0; $i < count($_SESSION['productos']); $i++) {
        array_push($_SESSION['carrito'], array($_SESSION['productos'][$i][0], 0));
    }
} else {
    $_SESSION['carrito'] = unserialize(base64_decode($_COOKIE['carrito']));
}

//Elimina una unidad del carrito del producto seleccionado
if (isset($_GET['eliminar'])) {
    $_SESSION['carrito'][$_GET['eliminar']][1]--;

    setcookie('carrito', base64_encode(serialize($_SESSION['carrito'])), time() + (3600 * 24), "/");
}

//Vacía el carrito por completo
if (isset($_GET['vaciar'])) {
    for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
        $_SESSION['carrito'][$i][1] = 0;
    }

    setcookie('carrito', base64_encode(serialize($_SESSION['carrito'])), time() + (3600 * 24), "/");
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

            for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                if ($_SESSION['carrito'][$i][1] != 0) {
                    echo '<tr>
                        <td>' . $_SESSION['carrito'][$i][0] . '</td>
                        <td>' . $_SESSION['carrito'][$i][1] . '</td>
                        <td><img src="data:image/jpg;charset=uft8;base64,' . base64_encode($_SESSION['productos'][$i][2]) . '"></td>
                        <td><a class="boton" href="./Ejercicio3-Carrito.php?eliminar=' . $i . '">Eliminar</a></td>
                    </tr>';

                    $total += ($_SESSION['carrito'][$i][1] * $_SESSION['productos'][$i][1]);
                    $unidades += $_SESSION['carrito'][$i][1];
                }
            }

            echo '<tr>
                        <td>Total</td><td>' . $unidades . '</td><td>' . $total . '</td><td><a class="boton" href="./Ejercicio3-Carrito.php?vaciar=">Vaciar la cesta</a></td>
                    </tr>'
            ?>
        </tbody>
    </table>
    <a href="./Ejercicio3.php" class="boton">Volver a la tienda</a>
</body>

</html>
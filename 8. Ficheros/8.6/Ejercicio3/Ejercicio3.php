<?php
// Inicio de sesión
session_start();

//Obtiene los valores de los productos del fichero productos.txt
if (!isset($_SESSION['productos']) || isset($_GET['eliminado']) || isset($_GET['productoNuevo'])) {
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

//Añade producto o unidad al carrito
if (isset($_GET['producto'])) {
    $producto = $_GET['producto'];

    for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
        if ($_GET['producto'] == $_SESSION['carrito'][$i][0]) {
            $_SESSION['carrito'][$i][1]++;
            $i = count($_SESSION['carrito']) - 1;
        }
    }

    setcookie('carrito', base64_encode(serialize($_SESSION['carrito'])), time() + (3600 * 24), "/");

    header('Refresh: 0 url=./Ejercicio3.php');
}

//Elimina producto o unidad del carrito
if (isset($_GET['eliminar'])) {
    for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
        if ($_GET['eliminar'] == $_SESSION['carrito'][$i][0]) {
            $_SESSION['carrito'][$i][1]--;
            $i = count($_SESSION['carrito']) - 1;
        }
    }

    setcookie('carrito', base64_encode(serialize($_SESSION['carrito'])), time() + (3600 * 24), "/");

    header('Refresh: 0 url=./Ejercicio3.php');
}

//Función que comprueba la cantidad de elementos que hay en el carrito
function cantidadCarrito()
{
    $cantidad = 0;

    for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
        $cantidad += $_SESSION['carrito'][$i][1];
    }

    echo $cantidad;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="Ejercicio3.css">
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="3">La tiendecita</th>
                <th>CESTA <?php cantidadCarrito() ?> pro</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th><a href="./Ejercicio3-Carrito.php">Ir al carrito</a></th>
            </tr>
            <?php
            for ($i = 0; $i < count($_SESSION['productos']); $i++) {
                echo '<tr>
                    <td>' . $_SESSION['productos'][$i][0] . '</td>
                    <td>' . $_SESSION['productos'][$i][1] . '</td>
                    <td><a href="./Ejercicio3-Catalogo.php?selector=' . $i . '"><img src="' . $_SESSION['productos'][$i][2] . '"></a></td>
                    <td><a class="boton" href="./Ejercicio3.php?producto=' . $_SESSION['productos'][$i][0] . '">Comprar</a></td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
    <a href="./Ejercicio3-Validacion.php?accion=añadir" class="boton">AÑADIR PRODUCTO</a>
    <a href="./Ejercicio3-Validacion.php?accion=eliminar" class="boton">ELIMINAR PRODUCTO</a>
</body>

</html>
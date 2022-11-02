<?php
//Crea el array de productos por defecto
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
    }
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

function cantidadCarrito(){
    $cantidad = 0;

    for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
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
                <th>Producto</th><th>Precio</th><th>Imagen</th><th><a href="./Ejercicio3-Carrito.php">Ir al carrito</a></th>
            </tr>
            <?php 
              for ($i=0; $i < count($productos); $i++) { 
                echo '<tr>
                    <td>'.$productos[$i][0].'</td>
                    <td>'.$productos[$i][1].'</td>
                    <td><a href="./Ejercicio3-Catalogo.php?selector='.$i.'"><img src="'.$productos[$i][2].'"></a></td>
                    <td><a class="boton" href="./Ejercicio3.php?producto='.$productos[$i][0].'">Comprar</a></td>
                </tr>';
              }  
            ?>
        </tbody>
    </table>
</body>

</html>
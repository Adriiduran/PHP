<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <link rel="stylesheet" href="Ejercicio5.css">
</head>

<body>

    <?php
    /*Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. Un catálogo de cuatro o cinco productos será suficiente. De cada producto se debe conocer al menos la descripción y el precio. Todos los productos deben tener una imagen que los identifique. Al lado de cada producto del catálogo deberá aparecer un botón Comprar que permita añadirlo al carrito. Si el usuario hace clic en el botón Comprar de un producto que ya estaba en el carrito, se deberá incrementar el número de unidades de dicho producto. Para cada producto que aparece en el carrito, habrá un botón Eliminar por si el usuario se arrepiente y quiere quitar un producto concreto del carrito de la compra. A continuación se muestra una captura de pantalla de una posible solución.*/

    session_start(); // Inicio de sesión
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array('BMW' => 0, 'AUDI' => 0, 'HONDA' => 0, 'TOYOTA' => 0);
    }

    $recarga = false;

    if (isset($_GET['producto'])) {
        $producto = $_GET['producto'];

        $_SESSION['carrito'][$producto]++;
        $recarga = true;
    }

    if (isset($_GET['eliminar'])) {
        $_SESSION['carrito'][$_GET['eliminar']] = 0;
        $recarga = true;
    }
    ?>

    <h1 class="tituloTienda">TIENDA ONLINE CON PRODUCTOS Y CARRITO</h1>
    <div class="flex">
        <div class="tienda">
            <h3>PRODUCTOS</h3>
            <div class="producto">
                <img src="./images/bmw.jpg">
                <p class="nombreProducto">Producto: BMW</p>
                <p class="Precio">Precio: 5€</p>
                <a href="./Ejercicio5-Catalogo.php?producto=BMW">Descripción</a>
                <a href="./Ejercicio5.php?producto=BMW">Comprar</a>
            </div>
            <div class="producto">
                <img src="./images/audi.jpg">
                <p class="nombreProducto">Producto: AUDI</p>
                <p class="Precio">Precio: 6€</p>
                <a href="./Ejercicio5-Catalogo.php?producto=AUDI">Descripción</a>
                <a href="./Ejercicio5.php?producto=AUDI">Comprar</a>
            </div>
            <div class="producto">
                <img src="./images/honda.jpg">
                <p class="nombreProducto">Producto: HONDA</p>
                <p class="Precio">Precio: 7€</p>
                <a href="./Ejercicio5-Catalogo.php?producto=HONDA">Descripción</a>
                <a href="./Ejercicio5.php?producto=HONDA">Comprar</a>
            </div>
            <div class="producto">
                <img src="./images/toyota.jpg">
                <p class="nombreProducto">Producto: TOYOTA</p>
                <p class="Precio">Precio: 8€</p>
                <a href="./Ejercicio5-Catalogo.php?producto=TOYOTA">Descripción</a>
                <a href="./Ejercicio5.php?producto=TOYOTA">Comprar</a>
            </div>
        </div>
        <div class="carrito">
            <h3>CARRITO</h3>
            <?php
            $precioTotal = 0;

            foreach ($_SESSION['carrito'] as $producto => $unidades) {
                $precio = 0;
                if ($unidades != 0) {

                    if ($producto == "BMW") {
                        $precio = 5;
                        $precioTotal += $unidades * $precio;
                    } else if ($producto == "AUDI") {
                        $precio = 6;
                        $precioTotal +=  $unidades * $precio;
                    } else if ($producto == "HONDA") {
                        $precio = 7;
                        $precioTotal += $unidades * $precio;
                    } else {
                        $precio = 8;
                        $precioTotal += $unidades * $precio;
                    }

                    echo '<div class="producto">
                    <img src="./images/' . strtolower($producto) . '.jpg">
                    <p class="nombreProducto">Producto: '.$producto.'</p>
                    <p class="Precio">Precio: ' . $precio . '€</p>
                    <p>Unidades: ' . $unidades . '</p>
                    <a href="./Ejercicio5.php?eliminar=' . $producto . '">Eliminar</a>
                </div>';
                }
            }

            if ($precioTotal != 0) {
                echo '<h2 class="Total">Total: ' . $precioTotal . '€</h2>';
            }

            if ($recarga == true) {
                header('Refresh: 0 url=./Ejercicio5.php');
                $recarga = false;
            }


            ?>
        </div>
    </div>
</body>

</html>
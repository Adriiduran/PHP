<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <link rel="stylesheet" href="./Ejercicio5.css">
</head>

<body>

    <?php
    /*Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. Un catálogo de cuatro o cinco productos será suficiente. De cada producto se debe conocer al menos la descripción y el precio. Todos los productos deben tener una imagen que los identifique. Al lado de cada producto del catálogo deberá aparecer un botón Comprar que permita añadirlo al carrito. Si el usuario hace clic en el botón Comprar de un producto que ya estaba en el carrito, se deberá incrementar el número de unidades de dicho producto. Para cada producto que aparece en el carrito, habrá un botón Eliminar por si el usuario se arrepiente y quiere quitar un producto concreto del carrito de la compra. A continuación se muestra una captura de pantalla de una posible solución.*/

    //Conecta con la base de datos para recuperar los productos guardados


    try {
        session_start();
        if (!isset($_SESSION['boolean'])) {
            $_SESSION['boolean'] = false;
        }

        $conexion = new PDO("mysql:host=localhost;dbname=productosej3;charset=utf8", "root", "");

        if ($_SESSION['boolean'] == false) {
            $_SESSION['boolean'] = true;
            header('Refresh:0 url=#');
        }
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    $productos_consulta = $conexion->query("select * from productos");


    //Crea el array carrito por defecto
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();

        while ($registro = $productos_consulta->fetchObject()) {
            array_push($_SESSION['carrito'], array($registro->marca, 0));
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
        header('Refresh: 0 url=./Ejercicio5.php');
    }

    //Elimina producto del carrito
    if (isset($_GET['eliminar'])) {
        for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
            if ($_GET['eliminar'] == $_SESSION['carrito'][$i][0]) {
                $_SESSION['carrito'][$i][1] = 0;
                $i = count($_SESSION['carrito']) - 1;
            }
        }
    }

    ?>

    <h1 class="tituloTienda">TIENDA ONLINE CON PRODUCTOS Y CARRITO</h1>
    <div class="flex">
        <div class="tienda">
            <h2>PRODUCTOS</h2>
            <?php
            if (!isset($productos_consulta)) {
                echo 'No hay productos disponibles';
            } else {

                while ($registro = $productos_consulta->fetchObject()) {
                    echo '<div class="producto">
                    <img src="' . $registro->imagen . '">
                    <p class="nombreProducto">Producto: ' . $registro->marca . '</p>
                    <p class="Precio">Precio: ' . $registro->precio . '€</p>
                    <a href="./Ejercicio5-Catalogo.php?producto=' . $registro->marca . '">Descripción</a>
                    <a href="./Ejercicio5.php?producto=' . $registro->marca . '">Comprar</a>
                </div>';
                }

                echo '<div class="producto"><a href="./Ejercicio5-Validacion.php?accion=alta">ALTA</a>';
                echo '<a href="./Ejercicio5-Validacion.php?accion=baja">BAJA</a>';
                echo '<a href="./Ejercicio5-Validacion.php?accion=mod">MODIFICACIÓN</a></div>';
            }
            ?>
        </div>

        <div class="carrito">
            <h2>CARRITO</h2>
            <?php
            $precioTotal = 0;

            for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                if ($_SESSION['carrito'][$i][1] != 0) {

                    $consulta = $conexion->query("select * from productos where marca='" . $_SESSION['carrito'][$i][0] . "'")->fetchObject();

                    echo '<div class="producto">
                    <img src="' . $consulta->imagen . '">
                    <p class="nombreProducto">Producto: ' . $consulta->marca . '</p>
                    <p class="Precio">Precio: ' . $consulta->precio . '€</p>
                    <p>Unidades: ' . $_SESSION['carrito'][$i][1] . '</p>
                    <a href="./Ejercicio5.php?eliminar=' . $consulta->marca . '">Eliminar</a>
                    </div>';

                    $precioTotal += $_SESSION['carrito'][$i][1] * $consulta->precio;
                }
            }

            if ($precioTotal != 0) {
                echo '<h2 class="total">Total: ' . $precioTotal . '€</h2>';
            }
            ?>
        </div>
    </div>
</body>

</html>
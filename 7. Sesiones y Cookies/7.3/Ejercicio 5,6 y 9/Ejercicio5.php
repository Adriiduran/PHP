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
    
    //Crea el array de productos por defecto
    if (!isset($_COOKIE['productos'])) {
        $productos = array(
            array('BMW', '5', './images/bmw.jpg', 'Descripcion personalizada para la pegatina de BMW'),
            array('AUDI', '6', './images/audi.jpg', 'Descripcion personalizada para la pegatina de AUDI'),
            array('HONDA', '7', './images/honda.jpg', 'Descripcion personalizada para la pegatina de HONDA'),
            array('TOYOTA', '8', './images/toyota.jpg', 'Descripcion personalizada para la pegatina de TOYOTA')
        );

        setcookie('productos', base64_encode(serialize($productos)), time() + 3600, "/");
        header('Refresh: 0 url=./Ejercicio5.php');
    }

    $productos = unserialize(base64_decode($_COOKIE['productos']));

    // Inicio de sesión
    session_start();

    //Crea el array carrito por defecto
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();

        for ($i=0; $i < count($productos); $i++) { 
            array_push($_SESSION['carrito'],array($productos[$i][0],0));
        }
    }

    //Para el refresh de la página para eliminar elementos de la URL (evitar añadir elementos al carrito al refrescar)
    $recarga = false;

    //Añade producto o unidad al carrito
    if (isset($_GET['producto'])) {
        $producto = $_GET['producto'];

        for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
            if ($_GET['producto'] == $_SESSION['carrito'][$i][0]) {
                $_SESSION['carrito'][$i][1]++;
                $i = count($_SESSION['carrito'])-1;
            }
        }
        header('Refresh: 0 url=./Ejercicio5.php');
    }

    //Elimina producto del carrito
    if (isset($_GET['eliminar'])) {
        for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
            if ($_GET['eliminar'] == $_SESSION['carrito'][$i][0]) {
                $_SESSION['carrito'][$i][1] = 0;
                $i = count($_SESSION['carrito'])-1;
            }
        }
    }

    ?>

    <h1 class="tituloTienda">TIENDA ONLINE CON PRODUCTOS Y CARRITO</h1>
    <div class="flex">
        <div class="tienda">
            <h3>PRODUCTOS</h3>
            <?php
            if (!isset($_COOKIE['productos'])) {
                echo 'No hay productos disponibles';
            } else {

                for ($i = 0; $i < count($productos); $i++) {
                    echo '<div class="producto">
                    <img src="' . $productos[$i][2] . '">
                    <p class="nombreProducto">Producto: ' . $productos[$i][0] . '</p>
                    <p class="Precio">Precio: ' . $productos[$i][1] . '€</p>
                    <a href="./Ejercicio5-Catalogo.php?producto=' . $productos[$i][0] . '">Descripción</a>
                    <a href="./Ejercicio5.php?producto=' . $productos[$i][0] . '">Comprar</a>
                </div>';
                }

                echo '<div class="producto"><a href="./Ejercicio5-Validacion.php?accion=alta">ALTA</a>';
                echo '<a href="./Ejercicio5-Validacion.php?accion=baja">BAJA</a>';
                echo '<a href="./Ejercicio5-Validacion.php?accion=mod">MODIFICACIÓN</a></div>';
            }
            ?>
        </div>

        <div class="carrito">
            <h3>CARRITO</h3>
            <?php
            $precioTotal = 0;

            for ($i=0; $i < count($_SESSION['carrito']); $i++) {    
                $selector = 0; 
                if ($_SESSION['carrito'][$i][1] != 0) {

                    for ($j=0; $j < count($productos); $j++) { 
                        if ($productos[$i][0] == $_SESSION['carrito'][$j][0]) {
                            $selector = $j;
                            $j = count($productos)-1;
                        }
                    }

                    echo '<div class="producto">
                    <img src="'.$productos[$selector][2].'">
                    <p class="nombreProducto">Producto: ' . $productos[$selector][0] . '</p>
                    <p class="Precio">Precio: ' . $productos[$selector][1] . '€</p>
                    <p>Unidades: ' . $_SESSION['carrito'][$i][1] . '</p>
                    <a href="./Ejercicio5.php?eliminar=' . $productos[$selector][0] . '">Eliminar</a>
                    </div>';

                    $precioTotal += $_SESSION['carrito'][$i][1] * $productos[$selector][1]; 
                }
            }

            if ($precioTotal != 0) {
                echo '<h2 class="Total">Total: ' . $precioTotal . '€</h2>';
            }
            ?>
        </div>
    </div>
</body>

</html>
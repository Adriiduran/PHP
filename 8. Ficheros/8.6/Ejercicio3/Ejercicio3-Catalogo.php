<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link rel="stylesheet" href="./Ejercicio3.css">
</head>

<body>
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

    if (isset($_GET['selector'])) {
        $selector = $_GET['selector'];
    }

    echo '<h1 class="tituloTienda">DETALLE DEL PRODUCTO</h1>
        <div class="productoCatalogo">
            <img class="imagenCatalogo" src="' . $_SESSION['productos'][$selector][2] . '">
            <p class="nombreProducto">Producto: ' . $_SESSION['productos'][$selector][0] . '</p>
            <p class="Precio">Precio: ' . $_SESSION['productos'][$selector][1] . '€</p>
            <p class="descripcion">Descripción: ' . $_SESSION['productos'][$selector][3] . '</p>
            <a class="boton" href="./Ejercicio3.php">Volver</a>
        </div>';
    ?>
</body>

</html>
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
    $productos = unserialize(base64_decode($_COOKIE['productos2']));

    if (isset($_GET['selector'])) {
        $selector = $_GET['selector'];
    }

    echo '<h1 class="tituloTienda">DETALLE DEL PRODUCTO</h1>
        <div class="productoCatalogo">
            <img class="imagenCatalogo" src="' . $productos[$selector][2] . '">
            <p class="nombreProducto">Producto: ' . $productos[$selector][0] . '</p>
            <p class="Precio">Precio: ' . $productos[$selector][1] . '€</p>
            <p class="descripcion">Descripción: ' . $productos[$selector][3] . '</p>
            <a class="boton" href="./Ejercicio3.php">Volver</a>
        </div>';
    ?>
</body>

</html>
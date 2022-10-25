<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link rel="stylesheet" href="Ejercicio5.css">
</head>

<body>
    <?php
    if (isset($_GET['producto'])) {
        $producto = $_GET['producto'];

        if ($producto == "BMW") {
            $precio = 5;
        } else if ($producto == "AUDI") {
            $precio = 6;
        } else if ($producto == "HONDA") {
            $precio = 7;
        } else {
            $precio = 8;
        }
    }

    echo '<h1 class="tituloTienda">DETALLE DEL PRODUCTO</h1>
    <div class="productoCatalogo">
        <img class="imagenCatalogo" src="./images/'.strtolower($producto).'.jpg">
        <p class="nombreProducto">Producto: '.$producto.'</p>
        <p class="Precio">Precio: '.$precio.'€</p>
        <p class="descripcion">Descripción: Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, eligendi?</p>
        <a href="./Ejercicio5.php">Volver</a>
        <a href="./Ejercicio5.php?producto='.$producto.'">Comprar</a>
    </div>';
    ?>

</body>

</html>
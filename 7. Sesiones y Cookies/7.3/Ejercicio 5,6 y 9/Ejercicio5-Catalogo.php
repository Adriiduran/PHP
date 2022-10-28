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
    $productos = unserialize(base64_decode($_COOKIE['productos']));

    for ($i=0; $i < count($productos); $i++) { 
        if ($_GET['producto'] == $productos[$i][0]) {
            $selector = $i;
            $i = count($productos)-1;
        }
    }

    echo '<h1 class="tituloTienda">DETALLE DEL PRODUCTO</h1>
    <div class="productoCatalogo">
        <img class="imagenCatalogo" src="'.$productos[$selector][2].'">
        <p class="nombreProducto">Producto: '.$productos[$selector][0].'</p>
        <p class="Precio">Precio: '.$productos[$selector][1].'€</p>
        <p class="descripcion">Descripción: '.$productos[$selector][3].'</p>
        <a href="./Ejercicio5.php">Volver</a>
        <a href="./Ejercicio5.php?producto='.$productos[$selector][0].'">Comprar</a>
    </div>';
    ?>

</body>

</html>
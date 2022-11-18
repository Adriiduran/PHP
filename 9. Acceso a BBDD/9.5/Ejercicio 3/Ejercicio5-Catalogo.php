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
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=productosej3;charset=utf8", "root", "");

    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    $productos_consulta = $conexion->query("select * from productos where marca='".$_GET['producto']."'")->fetchObject();

    //Muestra la tarjeta personalizada con los datos del producto seleccionado
    echo '<h1 class="tituloTienda">DETALLE DEL PRODUCTO</h1>
    <div class="productoCatalogo">
        <img class="imagenCatalogo" src="' . $productos_consulta->imagen . '">
        <p class="nombreProducto">Producto: ' . $productos_consulta->marca . '</p>
        <p class="Precio">Precio: ' . $productos_consulta->precio . '€</p>
        <p class="descripcion">Descripción: ' . $productos_consulta->descripcion . '</p>
        <a href="./Ejercicio5.php">Volver</a>
        <a href="./Ejercicio5.php?producto=' . $productos_consulta->marca . '">Comprar</a>
    </div>';
    ?>

</body>

</html>
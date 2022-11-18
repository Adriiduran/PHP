<?php 
session_start();
if (!isset($_SESSION['paginas'])) {
    $_SESSION ['paginas']=2;
}

if (!isset($_SESSION['compra'])) {
    $_SESSION['compra'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTISIMAL</title>
    <link rel="stylesheet" href="./Ejercicio5.css">
</head>

<body>
    <?php
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=ejercicio4;charset=utf8", "root", "");

    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $productos_consulta = $conexion->query("select * from productos");

    ///paginacion
    $tamano_pagina = $_SESSION ['paginas'];
    $num_total_registros = $productos_consulta->rowCount();
    $total_paginas = ceil($num_total_registros / $tamano_pagina);

    if (isset($_GET["pagina"])) {
        $pagina = $_GET["pagina"];
        if ($pagina == 0) {
            $pagina = 1;
        }
        $inicio = ($pagina - 1) * $tamano_pagina;
    } else {
        $pagina = 1;
        $inicio = 0;
    }
    $productos_consulta2 = $conexion->query("select * from productos limit " . $inicio . "," . $tamano_pagina);
    ?>

    <h1>GESTISIMAL</h1>
    <table>
        <tr>
            <th>Código</th><th>Descripción</th><th>Precio de Compra</th><th>Precio de Venta</th><th>Margen</th><th>Stock</th>
        </tr>
        <?php 
        while ($registro = $productos_consulta2->fetchObject()) {
        ?>
            <tr>
                <td><?= $registro->codigo ?></td>
                <td><?= $registro->descripcion ?></td>
                <td><?= $registro->precioCompra ?></td>
                <td><?= $registro->precioVenta ?></td>
                <td><?= $registro->precioVenta - $registro->precioCompra ?></td>
                <td><?= $registro->stock ?></td>
                <td><a href="./Ejercicio4-Modificacion.php?eliminar=<?= $registro->codigo?>">Eliminar</a></td>
                <td><a href="./Ejercicio4-Modificacion.php?modificar=<?= $registro->codigo?>">Modificar</a></td>
                <td><a href="./Ejercicio4-Modificacion.php?entrada=&codigo=<?= $registro->codigo?>&stock=<?=$registro->stock?>">Entrada</a></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="2">Página <?= $pagina.' de '.$total_paginas; ?></td><td><a href="./Ejercicio4.php?pagina=1">Primera</a></td><td><a href="./Ejercicio4.php?pagina=<?= $pagina-1?>">Anterior</a></td><td><a href="./Ejercicio4.php?pagina=<?= $pagina+1?>">Siguiente</a></td><td><a href="./Ejercicio4.php?pagina=<?= $total_paginas?>">Última</a></td>
        </tr>
        <tr>
            <th>Código</th><th>Descripción</th><th>Precio de Compra</th><th colspan="2">Precio de Venta</th><th>Stock</th>
        </tr>
        <tr>
        <form action="./Ejercicio4-Modificacion.php">
            <td>
               <input type="text" name="newCod"> 
            </td>
            <td>
               <input type="text" name="newDes"> 
            </td>
            <td>
               <input type="text" name="newPC"> 
            </td>
            <td colspan="2">
               <input type="text" name="newPV"> 
            </td>
            <td>
               <input type="text" name="newStock"> 
            </td>
            <td colspan="4">
                <input type="submit" value="Nuevo artículo">
            </td>
        </form>
        </tr>
    </table>

    <div class="container">
        <a class="boton" href="Ejercicio5-Venta.php">COMPRA ARTÍCULOS</a>
    </div>
</body>

</html>
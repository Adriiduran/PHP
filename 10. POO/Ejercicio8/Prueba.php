<?php
session_start();

include_once 'Zona.php';


if (!isset($_SESSION["zonas"])) {
    $zonaPrincipal = new principal();
    $zonaCompraVenta = new compraVenta();
    $zonaVip = new vip();
    $_SESSION["zonas"] = serialize(array($zonaPrincipal, $zonaCompraVenta, $zonaVip));
}

if (isset($_GET["comprar"])) {

    $zonas = unserialize($_SESSION["zonas"]);

    $zonaElegida = $_GET['zona'];
    $numEntradasCompra = $_GET["numEntradas"];

    if ($zonaElegida == "zonaPrincipal") {
        $zonas[0]->venderEntradas($numEntradasCompra);
    } else if ($zonaElegida == "zonaCompraVenta") {
        $zonas[1]->venderEntradas($numEntradasCompra);
    } else {
        $zonas[2]->venderEntradas($numEntradasCompra);
    }

    $zonas = serialize($zonas);
    $_SESSION["zonas"] = $zonas;

    header('Refresh: 0 url=./Prueba.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Zonas y entradas disponibles</h2>
    <?php


    $zonas = unserialize($_SESSION["zonas"]);
    /* MUESTRO LAS ZONAS Y LAS ENTRADAS DISPONIBLES */
    foreach ($zonas as $zona) {
        echo $zona;
    }
    ?>
    <h2>Venta de entradas</h2>
    <form action="#" method="get">
        <select name="zona" id="nombre">
            <option value="zonaPrincipal">Principal</option>
            <option value="zonaCompraVenta">Compra-Venta</option>
            <option value="zonaVip">Vip</option>
        </select>
        <br>
        Numeros de entradas: <input type="number" name="numEntradas" required min="1">
        <br><br>
        <input type="submit" value="Comprar" name="comprar">
    </form>
</body>

</html>
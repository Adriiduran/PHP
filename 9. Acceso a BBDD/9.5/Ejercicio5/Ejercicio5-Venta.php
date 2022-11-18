<?php 
    function comprobarClave($codigo, $conexion)
    {
        $sql = $conexion->query("select count(codigo) as cuenta from productos where codigo ='$codigo'");
    
        if ($sql->fetchObject()->cuenta == 1) {
            return true;
        } else {
            return false;
        }
    }

    //Conexión con la BBDD
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=ejercicio4;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    session_start();

    if (!isset($_SESSION['compra'])) {
        $_SESSION['compra'] = array();
    }

    var_dump($_SESSION['compra']);

    if (isset($_GET['codigo'])) {
        $codigo = $_GET['codigo'];
        $cantidad = $_GET['cantidad'];

        if (comprobarClave($codigo,$conexion) == true) {
            $sql = $conexion->query("select stock, precioVenta from productos where codigo='$codigo'");

            $registro = $sql->fetchObject();
            $stock = $registro->stock;

            if ($stock >= $cantidad) {
                $precioVenta = intval($registro->precioVenta);

                array_push($_SESSION['compra'], array($codigo,$cantidad,$precioVenta,$stock));
                header('Location:Ejercicio5-Venta.php');
            }
            else{
                echo 'No puedes comprar más del stock';
                header('Refresh: 3 url=Ejercicio5-Venta.php');
            }
        }
        else{
            echo 'No existe ningún producto con el código introducido';
            header('Refresh: 3 url=Ejercicio5-Venta.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VENTA DE PRODUCTOS</title>
</head>
<body>
    <form action="#">
        <label for="">Introduce el código del producto</label><br>
        <input type="text" name="codigo" required><br>
        <label for="">Introduce la cantidad a comprar</label><br>
        <input type="number" name="cantidad" required min="1"> <br>
        <input type="submit" value="Añadir">
    </form>
    <div><a href="./Ejercicio4.php">Volver</a></div>
    <div><a href="./Ejercicio5-Factura.php">Finalizar Compra</a></div>
</body>
</html>
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICACIÓN</title>
    <link rel="stylesheet" href="Ejercicio4.css">
</head>

<body>
    <?php
    //Conexión con la BBDD
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=ejercicio4;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    $productos_consulta = $conexion->query("select * from productos");

    //Introduce nuevo registro en la BBDD
    if (isset($_GET['newCod'])) {
        $codigo = $_GET['newCod'];
        $descripcion = $_GET['newDes'];
        $precioCompra = $_GET['newPC'];
        $precioVenta = $_GET['newPV'];
        $stock = $_GET['newStock'];

        if (comprobarClave($codigo, $conexion) == false) {
            $sql = "insert into productos (codigo, descripcion, precioCompra, precioVenta, stock) values ('" . $codigo . "','" . $descripcion . "','" . $precioCompra . "','" . $precioVenta . "','" . $stock . "')";

            $conexion->exec($sql);
            header('Location:./Ejercicio4.php');
        } else {
            echo 'La clave introducida ya existe en la BBDD introduce un clave diferente';
            header('Refresh: 2 url=./Ejercicio4.php');
        }
    }

    //Modifica un registro existente de la BBDD
    if (isset($_GET['modCod'])) {
        $oldCod = $_GET['oldCod'];
        $codigo = $_GET['modCod'];
        $descripcion = $_GET['modDes'];
        $precioCompra = $_GET['modPC'];
        $precioVenta = $_GET['modPV'];
        $stock = $_GET['modStock'];

        if (comprobarClave($codigo, $conexion) == false) {
            $sql = "UPDATE productos SET codigo='" . $codigo . "', descripcion='" . $descripcion . "', precioCompra=" . $precioCompra . ",precioVenta=" . $precioVenta . ", stock=" . $stock . " WHERE codigo='" . $oldCod . "'";

            $conexion->exec($sql);
            header('Location:./Ejercicio4.php');
        } else {
            echo 'La clave introducida ya existe en la BBDD introduce un clave diferente';
            header('Refresh: 2 url=./Ejercicio4.php');
        }
    }

    //Elimina un registro de la BBDD
    if (isset($_GET['eliminar'])) {
        $eliminar = $_GET['eliminar'];

        if (comprobarClave($codigo, $conexion) == true) {
            $sql = "delete from productos where codigo='$eliminar'";

            $conexion->exec($sql);
            header('Location:./Ejercicio4.php');
        } else {
            echo 'La clave introducida no existe en la BBDD introduce un clave diferente';
            header('Refresh: 2 url=./Ejercicio4.php');
        }
    }

    //Muestra formulario para la entrada/salida de mercancía
    if (isset($_GET['entrada']) || isset($_GET['salida'])) {

        if (isset($_GET['entrada'])) {
            $text = 'añadir';
        } else {
            $text = 'eliminar';
        }
    ?>

        <form action="./Ejercicio4-Modificacion.php">
            <label for="">Introduce la cantidad de unidades que se van a <?= $text ?> al stock</label>
            <input type="number" name="<?= $text . 'Stock' ?>" required>
            <input type="submit" value="<?= $text . 'Stock' ?>">
            <input type="hidden" name="codigo" value="<?= $_GET['codigo'] ?>">
            <input type="hidden" name="stock" value="<?= $_GET['stock'] ?>">
        </form>

    <?php
    }

    //Añade la cantidad elegida al stock
    if (isset($_GET['añadirStock'])) {
        $codigo = $_GET['codigo'];
        $cantidad = $_GET['añadirStock'];
        $stock = $_GET['stock'];

        $cantidadFinal = $cantidad + $stock;

        $conexion->exec("update productos set stock=$cantidadFinal where codigo='$codigo'");
        header("Location:Ejercicio4.php");
    }

    //Elimina la cantidad elegida al stock
    if (isset($_GET['eliminarStock'])) {
        $codigo = $_GET['codigo'];
        $cantidad = $_GET['eliminarStock'];
        $stock = $_GET['stock'];

        if ($stock - $cantidad < 0) {
            echo 'No se puede retirar una cantidad mayor a la del stock del producto';
            header('Refresh: 2 url=Ejercicio4.php');
        } else {
            $cantidadFinal = $stock - $cantidad;

            $conexion->exec("update productos set stock=$cantidadFinal where codigo='$codigo'");
            header("Location:Ejercicio4.php");
        }
    }

    if (isset($_GET['modificar'])) {
        $codigo = $_GET['modificar'];
    ?>
        <table>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio de Compra</th>
                <th>Precio de Venta</th>
                <th>Stock</th>
                <th>Modificar</th>
            </tr>
            <?php
            while ($registro = $productos_consulta->fetchObject()) {
                if ($registro->codigo == $codigo) {
            ?>
                    <tr>
                        <td><?= $registro->codigo ?></td>
                        <td><?= $registro->descripcion ?></td>
                        <td><?= $registro->precioCompra ?></td>
                        <td><?= $registro->precioVenta ?></td>
                        <td><?= $registro->stock ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <form action="./Ejercicio4-Modificacion.php">
                            <td>
                                <input type="text" name="modCod">
                            </td>
                            <td>
                                <input type="text" name="modDes">
                            </td>
                            <td>
                                <input type="text" name="modPC">
                            </td>
                            <td>
                                <input type="text" name="modPV">
                            </td>
                            <td>
                                <input type="text" name="modStock">
                            </td>
                            <td colspan="4">
                                <input type="submit" value="Modificar">
                            </td>
                            <input type="hidden" name="oldCod" value="<?= $registro->codigo ?>">
                        </form>
                    </tr>
            <?php
                }
            }
            ?>
        </table>

    <?php
    }
    ?>
</body>

</html>
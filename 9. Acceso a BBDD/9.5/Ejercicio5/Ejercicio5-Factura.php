<?php
//Conexión con la BBDD
try {
    $conexion = new PDO("mysql:host=localhost;dbname=ejercicio4;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}
session_start();
if (isset($_SESSION['compra'])) {
    $sesion = $_SESSION['compra'];
}
$total = 0;

foreach ($sesion as $productos => $value) {
    $sql = "update productos set stock=$value[3]-$value[1] where codigo='$value[0]'";
    $conexion->exec($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURA</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0px;
            margin: 0px;
        }

        .factura {
            width: 90vw;
            box-shadow: 5px 5px 5px 5px black;
            margin: 5vh auto;
            text-align: center;
            display: flex;
            flex-direction: column;
        }

        h1 {
            font-size: 3rem;
            border-bottom: .2rem solid black;
            padding: 50px;
            background-color: lightskyblue;
            color: white;
        }

        table,
        th,
        tr,
        td {
            border: 1px solid black;
            font-size: 2rem;
        }

        th,
        tr,
        td {
            padding: 15px;
        }
    </style>
</head>

<body>
    <main class="factura">
        <h1>FACTURA</h1>
        <table>
            <tr>
                <th>CODIGO</th>
                <th>CANTIDAD</th>
                <th>PRECIO DE VENTA</th>
                <th>TOTAL</th>
            </tr>
            <?php
            foreach ($sesion as $productos => $value) {
                $total += $value[1] * $value[2];
            ?>
                <tr>
                    <td><?= $value[0] ?></td>
                    <td><?= $value[1] ?></td>
                    <td><?= $value[2] . '€' ?></td>
                    <td><?= $value[1] * $value[2] . '€' ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <th colspan="3">TOTAL</th>
                <th><?= $total * 1.21 . '€' ?></th>
            </tr>
        </table>

        <a href="./Ejercicio4.php">VOLVER</a>
    </main>
</body>

</html>
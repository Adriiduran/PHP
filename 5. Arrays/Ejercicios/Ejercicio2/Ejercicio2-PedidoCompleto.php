<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        flex-direction: column;
    }

    table {
        border: 3px solid #000;
    }

    th,
    td {
        text-align: left;
        border: 2px solid #000;
        border-collapse: collapse;
        padding: 1em;
        font-size: 2em;
        text-align: center;
    }
</style>

<body>
    <h1><a href="./Ejercicio2.php">Hacer otro pedido</a></h1>
    <table>
        <tr>
            <th>
                Tipo
            </th>
            <th colspan="4">
                Ingredientes
            </th>
        </tr>
        <?php
        $arrayCadena = $_GET['oculto'];
        $array = unserialize(base64_decode($arrayCadena));

        foreach ($array as $pedido) {
            echo "<tr>";
            foreach ($pedido as $comida) {
                $comida = ucfirst($comida);
                echo "<td>$comida</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
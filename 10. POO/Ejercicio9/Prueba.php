<?php
include_once 'Coche.php';
session_start();

if (!isset($_SESSION['coches'])) {
    $_SESSION['coches'] = [];
} else {
    $_SESSION['coches'] = unserialize($_SESSION['coches']);
}

$sesionCoches = $_SESSION['coches'];


if (isset($_GET['añadir'])) {
    $tipo = $_GET['tipo'];
    $matricula = $_GET['matricula'];
    $modelo = $_GET['modelo'];
    $precio = $_GET['precio'];

    if ($tipo == "normal") {
        $coche = new Coche($matricula, $modelo, $precio);
    } else {
        $suplemento = $_GET['suplemento'];

        $coche = new CocheLujo($matricula, $modelo, $precio, $suplemento);
    }
    $sesionCoches[] = $coche;
    print_r($sesionCoches);
    $_SESSION['coches'] = serialize($sesionCoches);
}

/*Por si recarga la página sin introducir ningun coche*/
$_SESSION['coches'] = serialize($sesionCoches);
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
    <?php
    if (count($sesionCoches) == 0) {
        echo '<h1>NO HAY COCHES QUE MOSTRAR</h1>';
    } else {
    ?>
        <table>
            <thead>
                <tr>
                    <th colspan="4">El coche mas caro es: <?= Coche::masCaro() ?></th>
                </tr>
                <tr>
                    <td>MATRICULA</td>
                    <td>MODELO</td>
                    <td>PRECIO</td>
                    <td>SUPLEMENTO</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($sesionCoches as $coche) {
                    echo $coche;
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>

    <form action="#" method="get">
        <label for="">Selecciona el tipo de coche que quieres introducir</label> <br>
        <select name="tipo" id="tipo">
            <option value="normal" selected>Estandar</option>
            <option value="lujo">Lujo</option>
        </select> <br>
        <label for="">Introduce la matricula</label> <br>
        <input type="text" name="matricula" required> <br>
        <label for="">Introduce el modelo</label> <br>
        <input type="text" name="modelo" required> <br>
        <label for="">Introduce el precio</label> <br>
        <input type="number" name="precio" id="" required> <br>
        <label for="">Introduce el suplemento</label> <br>
        <input type="number" name="suplemento" id="suplemento" disabled> <br>
        <input type="submit" value="Crear" name="añadir">
    </form>

    <script>
        let tipo = document.getElementById("tipo");
        let suplemento = document.getElementById("suplemento");

        tipo.addEventListener("input", function() {
            if (tipo.value == "lujo") {
                suplemento.disabled = false;
                suplemento.required = true;
            } else {
                suplemento.disabled = true;
            }
        })
    </script>
</body>

</html>
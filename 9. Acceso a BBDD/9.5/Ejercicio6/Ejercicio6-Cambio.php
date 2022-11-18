<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMBIO</title>
</head>

<body>
    <?php
    $clases = ["servidor", "cliente", "empresa", "diseño", "libre", "depliegue"];

    try {
        $conexion = new PDO("mysql:host=localhost;dbname=escuela;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    if (isset($_GET['dia'])) {
        $dia = $_GET['dia'];
    } else {
        $dia = 0;
    }

    if (isset($_GET['hora'])) {
        $hora = $_GET['hora'];  
    } else {
        $hora = "null";
    }

    if (isset($_GET['clase'])) {
        $clase = $_GET['clase'];
    } else {
        $clase = "null";
    }

    session_start();
    if (!isset($_SESSION['cambio'])) {
        $_SESSION['cambio'] = [$dia, $hora];
    }

    if (isset($_GET['cambio'])) {
        $cambio = $_GET['cambio'];

        $conexion->exec("update horario set " . $_SESSION['cambio'][1] . "='$cambio' where dia=" . $_SESSION['cambio'][0] . "");
        unset($_SESSION['cambio']);
        header('Location: Ejercicio6.php');
    }
    ?>

    <form action="#">
        <select name="cambio">
            <?php
            foreach ($clases as $key) {
                if ($clase == $key) {
                    echo '<option value="' . $clase . '" selected>' . $clase . '</option>';
                } else {
                    echo '<option value="' . $key . '">' . $key . '</option>';
                }
            }
            ?>
        </select>
        <input type="submit" value="Cambiar">
    </form>
</body>

</html>
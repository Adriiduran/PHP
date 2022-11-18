<?php
try {
    $conexion = new PDO("mysql:host=localhost;dbname=escuela;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

$consulta = $conexion->query("select * from horario");

$horas = ["primera", "segunda", "tercera", "cuarta", "quinta","sexta"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HORARIO</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0px;
            margin: 0px;
        }

        table {
            margin: 0px auto;
            width: 90vw;
            text-align: center;
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

        a{
            text-decoration: none;
            padding: 10px 20px;
            border: 1px solid black;
            color: white;
            background-color: lightskyblue;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th colspan="5">2 DAW</th>
        </tr>
        <tr>
            <th>LUNES</th>
            <th>MARTES</th>
            <th>MIERCOLES</th>
            <th>JUEVES</th>
            <th>VIERNES</th>
        </tr>
        <?php
        $registro = $consulta->fetchAll();

        foreach ($horas as $hora) {
            ?>
            <tr>
                <?php 
                    for ($i=0; $i < 5; $i++) { 
                        echo '<td><a href="./Ejercicio6-Cambio.php?dia='.($i+1).'&hora='.$hora.'&clase='.$registro[$i][$hora].'">'.$registro[$i][$hora].'</a></td>';
                    }
                ?>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>
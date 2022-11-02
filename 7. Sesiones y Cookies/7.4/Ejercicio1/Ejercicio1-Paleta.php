<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paleta</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0px;
            margin: 0px;
        }

        body {
            background-color: <?php echo  '#' . $_GET['fondo']; ?>;
            height: 100vh;
            width: 100vw;
        }

        table {
            border: 1px solid black;
            width: 80vw;
            margin: 100px auto;
        }

        tr,
        td {
            border: 1px solid black;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        .boton {
            padding: 10px 20px;
            margin: 10px auto;
            background-color: white;
            color: black;
            border: 1px solid black;
            text-decoration: none;
            border-radius: 10px;
        }

        a{
            text-decoration: none;
            color: white;
        }

        .container{
            margin: 100px auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <?php
        session_start();

        if (isset($_GET['destruir'])) {
            session_destroy();
            header('Location: ./Ejercicio1.php');
        }

        $contador = 0;

        for ($i = 0; $i < count($_SESSION['colores']); $i++) {
            if ($i == 0) {
                echo '<tr>';
            } else if ($contador == 5) {
                echo '</tr>';
                $contador = 0;
            }

            echo '<td style="background:#' . $_SESSION['colores'][$i] . '"><a href="./Ejercicio1-Paleta.php?fondo=' . $_SESSION['colores'][$i] . '">' . $_SESSION['colores'][$i] . '</td>';
            $contador++;
        }
        ?>
    </table>

    <div class="container">
        <a class="boton" href="./Ejercicio1.php">Volver a la pagina principal</a>
        <a class="boton" href="./Ejercicio1-Paleta.php?destruir=">Destruir paleta</a>
    </div>
</body>

</html>
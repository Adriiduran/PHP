<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="form">
        <?php
        if (isset($_GET['lista'])) {

            $listaSinModificar = $_GET['lista']; //obtiene el string sin modificar

            $arrayLista = explode(',', $listaSinModificar); //separa el string por comas y lo convierte en un array

            $arrayLista_length = count($arrayLista); //determina el tamaño del array

            $aleatorio = rand(0, $arrayLista_length - 1); //obtenemos un número aleatorio con tamaño min=0 y max=tamaño de la lista

            echo '<br><h1>' . $arrayLista[$aleatorio] . '</h1><br>'; //mostramos al ganador del sorteo

            if ($arrayLista_length - 1 == 0) {
                echo '<br>Se han acabado los participantes de la lista proporcionada<br>';
            } else {

                unset($arrayLista[$aleatorio]); //eliminamos al ganador del sorteo

                $lista = implode(',', $arrayLista);

                //se muestran botones para seguir con el sorteo o para salir
                echo "<br><a href='./EjercicioOpcional-Validacion.php?lista=" . $lista . "'>Elegir de nuevo</a>";
            }

            echo '<a href="./EjercicioOpcional.php">Salir</a>';
        }
        ?>
    </div>

</body>

</html>
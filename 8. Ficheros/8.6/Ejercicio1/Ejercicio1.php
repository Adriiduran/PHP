<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLINICA VETERINARIA</title>
</head>
<body>
    <?php 
        //Inicia la sesión
        session_start();
        if (!isset($_SESSION['sesion'])) {
            $_SESSION['sesion'] = [];
            $sesion = $_SESSION['sesion'];
        }

        //Crea el formato de fecha elegido
        $fecha = '#'.date('d-m-Y').'#';

        //Muestra la tabla con las mascotas añadidas
        echo '<table class="tabla">';
        echo '<tr><th>Nombre</th><th>Tipo</th><th>Edad</th></tr>';
        for ($i=0; $i < count($sesion); $i++) { 
            echo '<tr>';
            echo '<td>'.$sesion[$i][0].'</td><td>'.$sesion[$i][1][0].'</td><td>'.$sesion[$i][1][1].'</td>';
            echo '</tr>';
        }
        echo '</table>'
    ?>

    <form action="#" method="get">
        <label for="">Nombre de la mascota</label>
        <input type="text" name="nombre">
        <label for=""></label>
        <input type="text" name="nombre">
        <label for="">Nombre de la mascota</label>
        <input type="text" name="nombre">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación</title>
</head>
<body>
    <?php 
        include './controlAcceso.php';

        $aleatorios = unserialize($_GET['aleatorios']);
        $tipo = $_GET['tipoUsuario'];
        $clave = $_GET['clave'];

        /*Comprueba si el usuario ha introducido correctamente la clave de acceso*/
        if (compruebaClave(dameTarjeta($tipo), $aleatorios, $clave) == true) {
            header('Location:./Ejercicio2-Correcto.php'); //Lo redirreciona a la web de acceso correcto
        }
    ?>
    <h1>ERROR!</h1> <br>
    <a href="./Ejercicio2.php">Volver a intentarlo</a>
</body>
</html>
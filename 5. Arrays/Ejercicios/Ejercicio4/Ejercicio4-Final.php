<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formador de parejas</title>
</head>
<body>
    <?php
    //print_r(unserialize(base64_decode($_GET['oculto'])));

    $array = $_GET['oculto'];

    echo '    <h1>ELIGE EL TIPO DE PAREJA ALEATORIO QUE QUIERAS FORMAR</h1>
    <a href="Ejercicio4-FormacionParejas.php?tipo=2&array='.$array.'><button type="submit">HETEROSEXUAL</button></a>
    <a href="Ejercicio4-FormacionParejas.php?tipo=1&array='.$array.'><button type="submit">HOMOSEXUAL</button></a>
    <a href="Ejercicio4-FormacionParejas.php?tipo=3&array='.$array.'><button type="submit">BISEXUAL</button></a>';

    if (isset($_GET['resultado'])) {
        $resultado = $_GET['resultado'];

        echo '<h2>'.$resultado.'</h2>';
    }
    ?>
</body>
</html>
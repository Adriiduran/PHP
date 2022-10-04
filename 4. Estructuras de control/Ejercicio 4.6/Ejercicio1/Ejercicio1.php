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
    /*Comprueba si se ha introducido un nombre. Si el nombre introducido es correcto lo lleva a la página
    de la victoria. Del contrario muestra un mensaje y lo devuelve a la página original*/
    if (isset($_GET["nombre"])) {
        $nombre = $_GET["nombre"];
        if ($nombre == "gollum") {
            header("location:./Ejercicio1-2.html");
        }
        else{
            header("Refresh:2; url=./Ejercicio1.html");
            echo "<h1>LO SIENTO NO HAS ACERTADO</h1>";
        }
    }
    /*Le muestra al usuario que imagen se escondía detras y lo devuelve a la página original*/
    else{
        header("Refresh:2; url=Ejercicio1.html");
    $num = $_REQUEST["num"];

    $validacion = (1 == $num) ? "1.jpg" : "oculto.jpg";
    echo "<img src='./images/".$validacion."'>";

    $validacion = (2 == $num) ? "2.jpg" : "oculto.jpg";
    echo "<img src='./images/".$validacion."'>";

    $validacion = (3 == $num) ? "3.jpg" : "oculto.jpg";
    echo "<img src='./images/".$validacion."'>";

    echo "<br>";

    $validacion = (4 == $num) ? "4.jpg" : "oculto.jpg";
    echo "<img src='./images/".$validacion."'>";

    $validacion = (5 == $num) ? "5.jpg" : "oculto.jpg";
    echo "<img src='./images/".$validacion."'>";

    $validacion = (6 == $num) ? "6.jpg" : "oculto.jpg";
    echo "<img src='./images/".$validacion."'>";

    echo "<br>";

    $validacion = (7 == $num) ? "7.jpg" : "oculto.jpg";
    echo "<img src='./images/".$validacion."'>";

    $validacion = (8 == $num) ? "8.jpg" : "oculto.jpg";
    echo "<img src='./images/".$validacion."'>";

    $validacion = (9 == $num) ? "9.jpg" : "oculto.jpg";
    echo "<img src='./images/".$validacion."'>";
    }
    ?>
</body>

</html>
<!--Vamos a diseñar un juego para adivinar imágenes mostrando solo alguna parte de ellas. Dividir una imagen en un mosaico de 3x3, y mostrar una cuadrícula en la página principal con todos los cuadrados del mosaico dados la vuelta. Debajo de la cuadrícula habrá una caja de texto para que el usuario intente adivinar el nombre de lo que aparece en la imagen, junto a un botón comprobar.
Cada vez que el usuario pulse en un cuadrado de la cuadrícula se mostrará el contenido solo de esa cuadrícula durante 2 segundos y posteriormente se volverá a ocultar.
Cuando el usuario escriba algo y pulse el botón comprobar ocurrirá lo siguiente:
-Si ha acertado se mostrará la imagen completa y un mensaje de felicitación por acertar.
-Si no ha acertado se mostrará un mensaje indicando que ha fallado y un botón de volver para seguir intentándolo.-->

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

    if (isset($_GET['intentos'])) {
        $intentos = $_GET['intentos'];
        $intentos++;
    } else {
        $intentos = 0;
    }

    echo '<a href="./Ejercicio1-Validacion.php?num=1&intentos=' . $intentos . '"><img src="./images/oculto.jpg"></a>';
    echo '<a href="./Ejercicio1-Validacion.php?num=2&intentos=' . $intentos . '"><img src="./images/oculto.jpg"></a>';
    echo '<a href="./Ejercicio1-Validacion.php?num=3&intentos=' . $intentos . '"><img src="./images/oculto.jpg"></a><br>';
    echo '<a href="./Ejercicio1-Validacion.php?num=4&intentos=' . $intentos . '"><img src="./images/oculto.jpg"></a>';
    echo '<a href="./Ejercicio1-Validacion.php?num=5&intentos=' . $intentos . '"><img src="./images/oculto.jpg"></a>';
    echo '<a href="./Ejercicio1-Validacion.php?num=6&intentos=' . $intentos . '"><img src="./images/oculto.jpg"></a><br>';
    echo '<a href="./Ejercicio1-Validacion.php?num=7&intentos=' . $intentos . '"><img src="./images/oculto.jpg"></a>';
    echo '<a href="./Ejercicio1-Validacion.php?num=8&intentos=' . $intentos . '"><img src="./images/oculto.jpg"></a>';
    echo '<a href="./Ejercicio1-Validacion.php?num=9&intentos=' . $intentos . '"><img src="./images/oculto.jpg"></a>';
    ?>

    <form action="./Ejercicio1-Validacion.php" method="get">
        <input type="text" name="nombre">
        <input type="hidden" name="intentos" value="<?php echo $intentos?>">
        <button type="submit">Enviar</button>
    </form>

    <?php
        echo "Intentos: " . $intentos;
    ?>
</body>

</html>
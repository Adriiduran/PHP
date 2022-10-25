<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericio 7</title>
</head>
<body>
    <?php 
        /*Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color) de una página. Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.*/

        if (isset($_COOKIE['color'])) {
            setcookie(color, "blue");
        }
    ?>
</body>
</html>
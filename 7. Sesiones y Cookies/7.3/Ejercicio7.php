<?php
/*Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color) de una página. Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.*/

if (isset($_GET['color'])) {
    setcookie("color", $_GET['color'], time() + 3600, "/");
    header('Refresh: 0 url=./Ejercicio7.php');

}

if (!isset($_COOKIE['color'])) {
    setcookie("color", 'none', time() + 3600, "/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericio 7</title>
    <style>
        body {
            background-color: <?php echo $_COOKIE['color']; ?>;
        }
    </style>
</head>

<body>


    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, vero?</h2>

    <form action="./Ejercicio7.php">
        <label for="">Elige un color de fondo que se almacena en las cookies</label>
        <select name="color">
            <option value="blue" selected>Azul</option>
            <option value="red">Rojo</option>
            <option value="orange">Naranja</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fallo</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
        background: darkslategrey;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #4caf50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .contenedor {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
</style>

<body>
    <?php
    echo '<div class="contenedor"><h1>LO SIENTO TE HAS QUEDADO SIN INTENTOS</h1><br>';
    echo '<a href="./Ejercicio3.php"><input type="submit" value="Volver a la página principal"></a></div>';
    ?>    
</body>

</html>
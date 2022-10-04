<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACIERTO</title>
    <style>
        img {
            height: 500px;
            width: 400px;
        }
    </style>
</head>

<body>
    <?php
    $intentos = $_GET['intentos'];

    echo '<h1>ENHORABUENA HAS ACERTADO TENIENDO ' . $intentos . ' INTENTOS RESTANTES</h1>';
    ?>
    <img src="./messi.webp">
</body>

</html>
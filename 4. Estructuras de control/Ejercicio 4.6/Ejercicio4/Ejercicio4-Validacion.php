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
        //recupera a que piso y bloque se ha llamado para mostrarlo por pantalla
        echo 'Has llamdo al piso '.$_GET["contadorPiso"].' del bloque '.$_GET["contadorBloque"];
    ?>
</body>
</html>
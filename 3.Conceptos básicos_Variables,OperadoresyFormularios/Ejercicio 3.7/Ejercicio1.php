<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Calculo del volumen de un cilindro</h2>
    <img src="./cilindro.webp">
    <h3><?php 
        $altura = $_GET["altura"];
        $diametro = $_GET["diametro"];
        
        echo "El volumen del cilindro es: ".$altura*$diametro*pi();
    ?></h3>
</body>
</html>
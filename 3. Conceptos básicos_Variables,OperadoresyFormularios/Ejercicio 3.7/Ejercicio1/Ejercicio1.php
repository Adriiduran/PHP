<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="estilo">
        <h2>"Calculo del volumen de un cilindro"</h2>
</br>
        <img src="./cilindro.webp" class="cilindro">
</br>
        <h3><?php
            $altura = $_GET["altura"];
            $diametro = $_GET["diametro"];

            echo "El volumen del cilindro es: " . $altura * pow(($diametro/2),2) * pi();
            ?></h3>
    </div>
</body>

</html>
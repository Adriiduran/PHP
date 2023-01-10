<?php 
    if (isset($_GET['moneda']) && isset($_GET['cantidad'])) {
        $moneda = $_GET['moneda'];
        $cantidad = $_GET['cantidad'];

        if ($moneda == 'euro') {
            $conversion = ($cantidad * 166.386) . " pesetas";
        }
        else {
            $conversion = ($cantidad / 166.386) . " euros";
        }

        $resultado = "EL RESULTADO ES: $conversion";
    }
    else{
        $resultado = 'NO SE HA ENCONTRADO CANTIDAD A CONVERTIR';
    }

    echo json_encode($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor de euros-pesetas</title>
</head>
<body>
</body>
</html>
<?php
    function crearCarta(){
        $palos = ["oros","bastos","espadas","copas"];
        $aleatorio = rand(0,3);
        $numero = rand(1,13);

        return [$palos[$aleatorio],$numero];
    }


    if (isset($_GET['cantidad'])) {
        $cantidad = $_GET['cantidad'];

        if ($cantidad>40 || $cantidad < 1) {
            $resultado = "ERROR, CANTIDAD DE CARTAS NO ESPERADA";
        }
        else{
            $contador = 1;
            $baraja = [];

            while ($contador != $cantidad) {
                $carta = crearCarta();

                if (in_array($carta,$baraja) == false) {
                    array_push($baraja, $carta);
                    $contador++;
                }
            }
        }

        $resultado = $baraja;
    }
    else{
        $resultado = "No se ha encontrado una cantidad de cartas";
    }

    echo json_encode($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baraja de cartas</title>
</head>
<body>
    
</body>
</html>
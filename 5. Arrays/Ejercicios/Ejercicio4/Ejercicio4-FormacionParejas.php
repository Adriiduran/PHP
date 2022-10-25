<?php
$array = unserialize(base64_decode($_GET['array']));
$tipo = $_GET['tipo'];
$resultado = "";

if (count($array) >= 2) {
    if ($tipo == 1) {
        $arrayHombre = array();
        $arrayMujer = array();

        foreach ($array as $persona => $valor) {
            if ($valor["sexo"] == "hombre" && ($valor["orientacion"] == "on" || $valor["orientacion"] == "bi")) {
                array_push($arrayHombre, $valor['nombre']);
            }
            if ($valor["sexo"] == "mujer" && ($valor["orientacion"] == "on" || $valor["orientacion"] == "bi")) {
                array_push($arrayMujer, $valor['nombre']);
            }
        }

        if (count($arrayHombre) >= 2 || count($arrayMujer) >= 2) {

            if (count($arrayHombre) >= 2 && count($arrayMujer) >= 2) {
                $aleatorioSexo = rand(0, 1);


                if ($aleatorioSexo == 0) {
                    do {
                        $aleatorio1 = rand(0, count($arrayHombre) - 1);
                        $aleatorio2 = rand(0, count($arrayHombre) - 1);
                    } while ($aleatorio1 == $aleatorio2);

                    $resultado = 'La pareja ganadora es ' . $arrayHombre[$aleatorio1] . ' y ' . $arrayHombre[$aleatorio2];
                } else {
                    do {
                        $aleatorio1 = rand(0, count($arrayMujer) - 1);
                        $aleatorio2 = rand(0, count($arrayMujer) - 1);
                    } while ($aleatorio1 == $aleatorio2);

                    $resultado = 'La pareja ganadora es ' . $arrayMujer[$aleatorio1] . ' y ' . $arrayMujer[$aleatorio2];
                }
            } else if (count($arrayHombre) >= 2) {
                do {
                    $aleatorio1 = rand(0, count($arrayHombre) - 1);
                    $aleatorio2 = rand(0, count($arrayHombre) - 1);
                } while ($aleatorio1 == $aleatorio2);

                $resultado = 'La pareja ganadora es ' . $arrayHombre[$aleatorio1] . ' y ' . $arrayHombre[$aleatorio2];
            } else {
                do {
                    $aleatorio1 = rand(0, count($arrayMujer) - 1);
                    $aleatorio2 = rand(0, count($arrayMujer) - 1);
                } while ($aleatorio1 == $aleatorio2);

                $resultado = 'La pareja ganadora es ' . $arrayMujer[$aleatorio1] . ' y ' . $arrayMujer[$aleatorio2];
            }
        } else {
            $resultado = "No ha suficientes personas de cada sexo para formar parejas compatibles";
        }
    } else if ($tipo == 2) {
        $arrayHombre = array();
        $arrayMujer = array();

        foreach ($array as $persona => $valor) {
            if ($valor['sexo'] == "hombre" && ($valor['orientacion'] == "hetero" || $valor['orientacion'] == "bi")) {
                array_push($arrayHombre, $valor['nombre']);
                echo $valor['nombre'];
            } else if ($valor['sexo'] == "mujer" && ($valor['orientacion'] == "hetero" || $valor['orientacion'] == "bi")) {
                array_push($arrayMujer, $valor['nombre']);
                echo $valor['nombre'];
            }
        }

        if (count($arrayHombre) >= 1 && count($arrayMujer) >= 1) {
            $aleatorioHombre = rand(0, count($arrayHombre) - 1);
            $aleatorioMujer = rand(0, count($arrayMujer) - 1);

            $resultado = 'La pareja ganadora es ' . $arrayHombre[$aleatorioHombre] . ' y ' . $arrayMujer[$aleatorioMujer];
        } else {
            $resultado = "No ha suficientes personas de cada sexo para formar parejas compatibles";
        }
    } else {

        $arrayBi = array();

        foreach ($array as $persona => $valor) {
            if ($valor['orientacion'] == "bi") {
                array_push($arrayBi, $valor['nombre']);
            }
        }

        if (count($arrayBi) > 1) {
            do {
                $aleatorio1 = rand(0, count($arrayBi) - 1);
                $aleatorio2 = rand(0, count($arrayBi) - 1);
            } while ($aleatorio1 == $aleatorio2);

            $resultado = 'La pareja ganadora es ' . $arrayBi[$aleatorio1] . ' y ' . $arrayBi[$aleatorio2];
        } else {
            $resultado = 'No ha suficientes personas de cada sexo para formar parejas compatibles';
        }
    }
} else {
    $resultado = "No hay personas suficientes en la BBDD para formar parejas";
}



$oculto = base64_encode(serialize($array));

header("Location:Ejercicio4-Final.php?resultado={$resultado}&oculto={$oculto}");

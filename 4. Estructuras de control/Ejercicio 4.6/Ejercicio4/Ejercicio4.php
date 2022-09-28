<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
    <style>
        table, th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        $contadorBloque = 1;
        $contadorPiso = 1;

        for ($i=0; $i < 71; $i++) {

            if ($i%7 == 0 && $i != 0) {   
                $contadorBloque++;
            }

            if ($contadorPiso == 8){
                $contadorPiso = 1;
            }


            if ($i == 0) {
                echo '<table><thead><tr><th>Bloque</th><th>Piso</th><th>TImbre</th></tr></thead><tbody><tr><td>'.$contadorBloque.'</td><td>'.$contadorPiso.'</td><td><a href="./Ejercicio4-Validacion.php?contadorPiso='.$contadorPiso.'&contadorBloque='.$contadorBloque.'">Timbre</a></td></tr>';
            }
            else if ($i == 70){
                echo "</tbody></table>";
            }
            else{
                echo '<tr><td>'.$contadorBloque.'</td><td>'.$contadorPiso.'</td><td><a href="./Ejercicio4-Validacion.php?contadorPiso='.$contadorPiso.'&contadorBloque='.$contadorBloque.'">Timbre</a></td></tr>';
            }

            $contadorPiso++;
        }
    ?>
</body>
</html>
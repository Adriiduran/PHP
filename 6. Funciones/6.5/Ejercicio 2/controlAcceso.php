<?php 
    /*imprime la tarjeta de coordenadas en una tabla de HTML*/
    function imprimeTarjeta($tarjeta){

        for ($i=0; $i < 7; $i++) { 
            if ($i == 0) {
                echo '<table border=1><tr><th></th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th></tr>';
            }
            else if ($i == 6) {
                echo '</table>';
            }
            else{
                $contadorI = 0;
                $contadorJ = 0;

                for ($j=0; $j < 6; $j++) { 
                    if ($j == 0) {
                        echo '<tr><th>'.$i.'</th>';
                    }
                    else{
                        echo '<td>'.$tarjeta[$contadorI][$contadorJ].'</td>';
                        $contadorI++;
                        $contadorJ++;
                    }
                }
                echo '</tr>';
            }
        }
    }

    /*Devuelve el array de la tarjeta de coordenadas del perfil que se le haya pasado como parámetro*/
    function dameTarjeta($perfil){
        if ($perfil == "admin") {
            $coordenada = array(
                array(11,11,11,11,11),
                array(22,22,22,22,22),
                array(33,33,33,33,33),
                array(44,44,44,44,44),
                array(55,55,55,55,55)
            );
        }
        else{
            $coordenada = array(
                array(1,1,1,1,1),
                array(2,2,2,2,2),
                array(3,3,3,3,3),
                array(4,4,4,4,4),
                array(5,5,5,5,5)
            );
        }

        return $coordenada;
    }

    /*Comprueba si el valor introducido por el usuario se corresponde con el valor de la tarjeta de coordenadas del perfil seleccionado*/
    function compruebaClave($matriz,$coordenadas,$valor) {
        $filas = $coordenadas[0];
        $col = $coordenadas[1];

        if ($matriz[$col][$filas] == $valor) {
            return true;
        }

        return false;
    }
?>
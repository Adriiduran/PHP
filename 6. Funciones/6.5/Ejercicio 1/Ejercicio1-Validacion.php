<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>

<body>
    <?php
    /*Devuelve el array de valores completo si algunos de los campos introducidos por el usuario estan vacíos*/
    function combinacion($array, $serie){
        $arrayResultado = array();

        foreach ($array as $key) {
            if ($key == 0) { //si el parametro no tiene valor se le asigna uno aleatorio
                $key = rand(1, 49);
            }

            array_push($arrayResultado, $key);
        }

        if ($serie == "") { //si el parametro no tiene valor se le asigna uno aleatorio
            array_push($arrayResultado,rand(1,999));
        }
        else{
            array_push($arrayResultado,$serie);
        }

        return $arrayResultado;
    }

    /*Crea una tabla HTML con el contenido de la primitiva*/
    function imprimeApuesta($array, $texto){

        if ($texto == '') {
            $texto = "Combinación generada para la Primitiva"; //si el titulo de la primitiva no se ha introducido se coloca uno predeterminado
        }


        $contador = 0;

        for ($i=0; $i < 9; $i++) { 
            if ($i == 0) {
                echo '<table border=1><caption>'.$texto.'</caption>';
            }
            else if ($i == 8) {
                echo '</table>';
            }
            else if ($i == 7) {
                echo '<tr><td>Serie</td><td>'.$array[$contador].'</td></tr>';
                $contador++;
            }
            else{
                echo '<tr><td>Num'.($contador+1).'</td><td>'.$array[$contador].'</td></tr>';
                $contador++;
            }
        }
    }

    /*Recoge los valores de los parametros de la URL*/
    $serie = $_GET['serie'];
    $texto = $_GET['titulo'];

    /*Crea un array con los valores de los números introducidos por el usuario*/
    $arrayNum = array();

    for ($i = 1; $i <= 6; $i++) {
        if ($_GET['num' . $i] != "") {
            array_push($arrayNum, $_GET['num' . $i]);
        } else {
            array_push($arrayNum, 0);
        }
    }

    $arrayNum = combinacion($arrayNum,$serie);

    imprimeApuesta($arrayNum,$texto)
    ?>

</body>

</html>
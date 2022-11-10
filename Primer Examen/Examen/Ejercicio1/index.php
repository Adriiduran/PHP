<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>

<body>
    <?php
    //Creación de array predeterminados
    $arrayCategorias = ['turismo', 'berlina', 'monovolumen', 'deportivo', 'furgoneta'];
    $arrayCoches = array(
    );
    $arrayExtras = ['camara trasera', 'llantas de aleación', 'climatizador'];

    //Añadir coches al array para almacenarlos
    if (isset($_GET['marca'])) {
        $arrayCochesForm = unserialize(base64_decode($_GET['array']));
        $marca = $_GET['marca'];
        $categoria = $_GET['categoria'];
        $tiempo = time();
        $matricula = strval(rand(100, 999)) . '-' . strtoupper(substr($marca, -3));
        $arrayExtrasIns = [];

        if (isset($_GET['camara'])) {
            array_push($arrayExtrasIns, $_GET['camara']);
        }

        if (isset($_GET['llantas'])) {
            array_push($arrayExtrasIns, $_GET['llantas']);
        }

        if (isset($_GET['climatizador'])) {
            array_push($arrayExtrasIns, $_GET['climatizador']);
        }

        $arrayCochesForm['' . $matricula . ''] = array();

        array_push($arrayCochesForm['' . $matricula . ''], array($tiempo, $marca, $categoria, array($arrayExtrasIns)));

        $arrayCoches = array_merge($arrayCoches,$arrayCochesForm);
    }

    print_r($arrayCoches);
    ?>

    <form action="#">
        <label for="">MARCA:</label>
        <input type="text" name="marca" required>
        <?php
        echo '<select name="categoria">';
        for ($i = 0; $i < count($arrayCategorias); $i++) {
            echo '<option value="' . $arrayCategorias[$i] . '">' . $arrayCategorias[$i] . '</option>';
        }
        echo '</select>';
        ?>
        <br>
        <label for="">Extras:</label><br>
        <input type="checkbox" name="camara" value="camara">
        <label for="">Cámara Trasera</label><br>
        <input type="checkbox" name="llantas" value="llantas">
        <label for="">LLantas de aleación</label><br>
        <input type="checkbox" name="climatizador" value="climatizador">
        <label for="">Climatizador</label><br>
        <?php
        echo '<input type="hidden" name="array" value="' . base64_encode(serialize($arrayCoches)) . '">';
        ?>
        <input type="submit" value="Enviar">
    </form>

    <?php 
        echo '<table border="1">
            <tr>
                <th>MATRÍCULA</th><th>FECHA</th><th>MARCA</th><th>TIPO</th><th>EXTRAS</th>
            </tr>    
        ';

        foreach ($arrayCoches as $key => $value) {
            echo '<td>'.$key.'</td>';

            for ($i=0; $i < count($value); $i++) { 
                echo '<td>'.date('l - d/m/Y', $value[$i][0]).'</td>';
                echo '<td>'.$value[$i][1].'</td>';
                echo '<td>'.$value[$i][2].'</td>';

                if (count($value[$i][3]) != 0) {
                    echo '<td>';
                    for ($j=0; $j < count($value[$i][3][0]); $j++) { 
                        echo '-'.$value[$i][3][0][$j].'<br>';
                    }
                    echo '</td></tr>';
                }
                else{
                    echo '</tr>';
                }
            }
        }
    ?>
</body>

</html>
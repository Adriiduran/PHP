<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFORMACIÓN</title>
</head>

<body>
    <?php
    if (!isset($data['lista'])) {
    ?>
        <h2>NO SE HA REALIZADO NINGUNA PETICIÓN</h2>
        <?php
    } else {
        if (empty($data['lista']) == true) {
        ?>
            <h2>NO SE HAN ENCOTRADO RESULTADOS</h2>
    <?php
        } else {
            if (gettype($data['lista']) != "string") {
                foreach ($data['lista'] as $alumno) {
                    echo json_encode($alumno->__toString(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                }
            }
            else{
                echo json_encode($data['lista']);
            }
        }
    }
    ?>
    <br>
    <a href="./ConectarFormulario.php">Realizar otra petición</a>
</body>

</html>
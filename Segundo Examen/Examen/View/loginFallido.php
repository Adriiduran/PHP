<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN FALLIDO</title>
</head>

<body>
    <?php

    if ($data['tipoFallo'] == 0) {
        $titulo = "Lo siento es usted médico y esta web es solo para pacientes";
    } else {
        $titulo = "No existe ningun paciente con esas credenciales";
    }

    ?>

    <div class="tarjeta">
        <h2><?= $titulo ?></h2>
        <a href="../index.php">ACEPTAR</a>
    </div>
</body>

</html>
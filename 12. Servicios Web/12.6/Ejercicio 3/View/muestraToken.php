<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUESTRA TOKEN</title>
</head>
<body>
    <h2>Tu token de inicio de sesión es: <?=unserialize($_SESSION['cliente'])->getToken();?></h2>
    <a href="../View/formularioPeticion.php">Continuar</a>
</body>
</html>
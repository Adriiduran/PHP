<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
</head>
<body>
    <form action="./Controller/registro.php" method="post">
        <h3>Introduce tu nombre para registrarte</h3>
        <input type="text" name="nombre">
        <input type="submit" value="Registrarse">
    </form>

    <h3>Si ya tienes una cuenta</h3>
    <a href="./View/Login.php">Inicia Sesión</a>
</body>
</html>
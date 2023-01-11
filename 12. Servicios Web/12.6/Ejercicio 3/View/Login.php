<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h2>LOGIN</h2>
    <form action="../Controller/Login.php" method="POST">
        <h3>Nombre</h3>
        <input type="text" name="nombre">
        <h3>Token</h3>
        <input type="text" name="token">
        <br>
        <input type="submit" value="Iniciar Sesion">
    </form>
</body>
</html>
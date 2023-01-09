<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <main>
        <h2>RESERVA DE CITAS MÉDICAS</h2>
        <form action="./Controller/compruebaLogin.php" method="POST">
            <h3>USUARIO</h3>
            <input type="text" name="usuario" required>
            <h3>CONTRASEÑA</h3>
            <input type="text" name="contraseña" required>
            <br>
            <input type="submit" value="ACEPTAR">
        </form>
    </main>
</body>
</html>
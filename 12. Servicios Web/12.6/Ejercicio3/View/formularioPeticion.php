<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Petición</title>
</head>

<body>
    <h2>Bienvenido <?= unserialize($_SESSION['cliente'])->getNombre() ?></h2>
    <form action="../Controller/obtenerProductos.php" method="post">
        <h3>Listar por nombre</h3>
        <input type="text" name="nombre" required>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <form action="../Controller/obtenerProductos.php" method="post">
        <h3>Listar por rango de precio</h3>
        <h4>Min</h4>
        <input type="number" name="min" min="1" required>
        <h4>Max</h4>
        <input type="number" name="max" required min="1">
        <br>
        <input type="submit" value="Enviar">
    </form>

    <a href="../Controller/CerrarSesion.php">Cerrar Sesión</a>
</body>

</html>
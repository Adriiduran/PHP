<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta articulo</title>
</head>
<body>
    <form action="./grabaArticulo.php" method="POST">
        <h3>Código</h3>
        <input type="text" name="codigo">
        <h3>Título</h3>
        <input type="text" name="titulo">
        <h3>Contenido</h3>
        <textarea name="contenido" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
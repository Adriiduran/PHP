<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVA CATEGORIA</title>
</head>
<body>
    <?php 
        if (isset($_GET['nueva'])) {
            $nombre = $_GET['nueva'];
            $cookieCategorias = unserialize(base64_decode($_COOKIE['categorias']));

            $cookieCategorias[''.$nombre.''] = array();

            setcookie('categorias', base64_encode(Serialize($cookieCategorias)), time() + (60 * 60 * 24 * 7), "/");
            header('Location: ./index.php');
        }
    ?>
    <form action="#" method="get" class="form">
        <label for="">Nombre de la categoria</label>
        <input type="text" name="nueva">
        <input type="submit" value="CREAR">
    </form>
</body>
</html>
<?php
if (!isset($_COOKIE['categorias'])) {
    $categorias = array(
        'Politica' => array(),
        'Deportes' => array(),
        'Tecnologia' => array()
    );

    setcookie('categorias', base64_encode(serialize($categorias)), time() + (60 * 60 * 24 * 7), "/");

    header('Refresh: 0 url=./index.php');
} else {
    $cookieCategorias = unserialize(base64_decode($_COOKIE['categorias']));
}

if (isset($_GET['eliminar'])) {
    foreach ($cookieCategorias as $categoria => $arrayNoticias) {
        $cookieCategorias['' . $categoria . ''] = array();
    }

    setcookie('categorias', base64_encode(serialize($cookieCategorias)), time() + (60 * 60 * 24 * 7), "/");
    
    if (isset($_COOKIE['copia'])) {
        setcookie('copia', null, -1, '/');
    }

    header('Refresh: 0 url=./index.php');
}

if (isset($_GET['guardar'])) {
    setcookie('copia', $_COOKIE['categorias'], time() + (60*60*24*365), '/');
}

if (isset($_GET['recuperar'])) {
    setcookie('categorias', $_COOKIE['copia'], time() + (60*60*24*7), '/');
    header('Refresh: 0 url=./index.php');
}

print_r($cookieCategorias);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>CATEGORIAS</h1>
        <?php
        if (!isset($_GET['eliminar'])) {
            foreach ($cookieCategorias as $categoria => $noticias) {
                echo '<a class="boton" href="./anadirNoticias.php?categoria=' . $categoria . '">' . $categoria . '</a>';
            }
        }
        ?>
    </div>

    <div class="container">
        <a class="boton remove" href="./index.php?eliminar=">ELIMINAR TODAS LAS NOTICIAS</a>
        <a href="./index.php?guardar=" class="boton">GUARDAR</a>
        <a href="./index.php?recuperar=" class="boton">RECUPERAR</a>
        <a href="./nuevaCategoria.php" class="boton">NUEVA CATEGORIA</a>
    </div>
</body>

</html>
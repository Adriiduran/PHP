<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORIAS</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <?php
    $cookieCategorias = unserialize(base64_decode($_COOKIE['categorias']));

    print_r($cookieCategorias);

    //Obtiene cual es la categoría seleccionada para poder mostrar solo las noticias relacionadas
    if (isset($_GET['categoria'])) {
        $categoria = $_GET['categoria'];
    }

    //Elimina todas las noticias de la categoría seleccionada
    if (isset($_GET['eliminar'])) {
        $cookieCategorias['' . $categoria . ''] = array();

        setcookie('categorias', base64_encode(Serialize($cookieCategorias)), time() + (60 * 60 * 24 * 7), "/");
        header('Refresh: 0 url= ./anadirNoticias.php?categoria=' . $categoria . '');
    }

    //Inserta una nueva noticia
    if (isset($_GET['titulo'])) {

        array_push($cookieCategorias['' . $categoria . ''], array(ucfirst($_GET['titulo']), $_GET['info'], $_GET['time']));

        setcookie('categorias', base64_encode(Serialize($cookieCategorias)), time() + (60 * 60 * 24 * 7), "/");
        header('Refresh: 0 url= ./anadirNoticias.php?categoria=' . $categoria . '');
    }
    ?>

    <div class="container">
        <h2>AÑADE UNA NOTICIA A LA CATEGORIA: <?php echo strtoupper($categoria); ?></h2>

        <form action="./anadirNoticias.php" method="get" class="form">
            <label for="">Introduce el título de la Noticia</label>
            <input type="text" name="titulo" required>
            <label for="">Introduce la información de la Noticia</label>
            <input type="text" name="info" required>
            <input type="hidden" name="time" value="<?php echo "Fecha: " . date('d/m/Y') . " Hora: " . date('H:i a') . "" ?>">
            <input type="hidden" name="categoria" value="<?php echo $categoria; ?>">
            <input type="submit" value="AÑADIR">
        </form>

        <h2>NOTICIAS</h2>
        <div class="noticias">
        <?php
        //Obtiene todos las noticias
        foreach ($cookieCategorias as $titulo => $noticias) {
            if ($titulo == $categoria) {
                for ($i=0; $i < count($noticias); $i++) { 
                    echo '<div><h3>'.$noticias[$i][0].'</h3>';
                    echo '<p>'.$noticias[$i][1].'</p>';
                    echo '<p>'.$noticias[$i][2].'</p></div>';
                }
            }
        }
        ?>
        </div>

        <a class="boton" href="./index.php">VOLVER</a>

        <a href="./anadirNoticias.php?categoria=<?php echo $categoria; ?>&eliminar=" class="boton">ELIMINAR TODAS LAS NOTICIAS DE LA CATEGORIA</a>

    </div>
</body>

</html>
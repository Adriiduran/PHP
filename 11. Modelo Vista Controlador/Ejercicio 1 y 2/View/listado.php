<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h3>LISTADO DE ARTICULOS</h3>
        <a class="boton" href="./Controller/nuevoArticulo.php">Nuevo artículo</a>
    </header>
    <main>
        <?php
        foreach ($data['articulos'] as $articulo) {
        ?>
            <section class="articulo">
                <div>
                    <h3 class="articulo__titulo"><?= $articulo->getTitulo() ?></h3>
                    <span class="articulo__fecha">Fecha de creación: <?= $articulo->getFecha() ?></span>
                    <p class="articulo__contenido"><?= $articulo->getContenido() ?></p>
                </div>
                <a class="articulo__btn" href="./Controller/borraArticulo.php?codigo=<?= $articulo->getCodigo() ?>">Borrar</a>
                <a class="articulo__btn" href="./Controller/formularioModificaArticulo.php?codigo=<?= $articulo->getCodigo() ?>">Modificar</a>
            </section>
        <?php
        }
        ?>
    </main>
</body>

</html>
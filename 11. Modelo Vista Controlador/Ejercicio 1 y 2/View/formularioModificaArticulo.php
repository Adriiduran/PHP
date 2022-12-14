<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICA ARTICULO</title>
</head>

<body>
    <header>
        <h3>MODIFICADO DE ARTICULO</h3>
    </header>
    <main>
        <section class="articulo">
            <form action="../Controller/modificaArticulo.php" method="post">
                <h3>Titulo</h3>
                <input type="text" name="titulo" value="<?= $articulo->getTitulo() ?>" required>
                <h3>Contenido</h3>
                <input type="text" name="contenido" value="<?= $articulo->getContenido() ?>" required>
                <input type="hidden" name="codigo" value="<?=$articulo->getCodigo()?>">
                <br>
                <input type="submit" value="MODIFICAR">
            </form>
        </section>
    </main>
</body>

</html>
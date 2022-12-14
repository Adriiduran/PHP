<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulario Modificar</title>
  </head>
  <body>
    <?php
    $codigo=$_GET['codigo'];
    $nombre=$_GET['nombre'];
    $precio=$_GET['precio'];
    $stock=$_GET['stock'];
    ?>
    <form action="../Controller/actualizarProducto.php" method="POST">
      <input type="hidden" name="codigo" value="<?=$codigo?>">
      <h3>Nombre: </h3>
      <input type="text" name="nombre" value="<?=$nombre?>" required>
      <h3>Precio: </h3>
      <input type="number" name="precio" value="<?=$precio?>" required>
      <br><h3>Stock: </h3>
      <input type="number" name="stock" value="<?=$stock?>" required>
      <hr>
      <input type="submit" value="Aceptar">
    </form>
  </body>
</html>
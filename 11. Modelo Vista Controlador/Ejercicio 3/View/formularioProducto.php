<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <form action="../Controller/grabaProducto.php"  enctype="multipart/form-data" method="POST">
      <h3>Nombre</h3>
      <input type="text" size="40" name="nombre" required>
      <h3>Precio</h3>
      <input type="number" size="40" name="precio" required>
      <br><h3>Stock</h3>
      <input type="number" size="40" name="stock" required><hr>
      <input type="submit" value="Aceptar">
    </form>
  </body>
</html>
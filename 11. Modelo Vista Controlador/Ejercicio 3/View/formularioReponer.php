<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <h2>Codigo: <?= $_GET['codigo']?></h2>
    <h2>Nombre: <?=$_GET['nombre']?></h2>
    <hr>
    <form action="../Controller/reponeProducto.php"  enctype="multipart/form-data" method="POST">
      <h3>Stock</h3>
      <p>Introduce la cantidad que deseas sumarle al stock </p>
      <input type="number" size="40" name="stock" required><hr>
      <input type="hidden" name="codigo" value="<?= $_GET['codigo']?>">
      <input type="submit" value="Aceptar">
    </form>
  </body>
</html>
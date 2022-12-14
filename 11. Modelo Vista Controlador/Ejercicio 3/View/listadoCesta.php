<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Listado de articulos</title>
  <style>
    *{
      font-size: 20px;
    }
     .pag_tittle {
      text-align: center;
      position: relative;
    }

    .boton {
      width: 150px;
      height: 50px;
      background-color: lightgreen;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid black;
      border-radius: 15px;
      margin: 10px;
    }
    .boton2{
      width: 100px;
      height: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid black;
      border-radius: 15px;
      margin: 10px;
    }
    .botonFactura{
      background-color: lightcoral;
      text-align: center;
    }
    .comprar{
      background-color: pink;
    }
    .borrar{
      background-color: lightseagreen;
    }
    a{
      text-decoration: none;
      color: black;
    }
    .div{
      text-align: left;
      float: left;
      margin-left: 30px;
      clear: both;
    }
  </style>
</head>

<body>
  <h1 class="pag_tittle"LISTADO DE PRODUCTOS</h1>
  <br>
  <div class="boton">
    <a href="../Controller/index.php">Volver</a>
  </div>
  <hr>
  <table border="1" style="margin: 30px;">
  <tr>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Cantidad</th>
    </tr>
  <?php
  $cantidadTotal=0;
  $precioTotal=0;
  foreach ($data['productosCesta'] as $producto) {
    $cantidadTotal+=$producto->getCantidad();
    $precioTotal+=$producto->getPrecio()*$producto->getCantidad();
  ?>
  <tr>
      <td><?= $producto->getNombre() ?></td>
      <td><?= $producto->getPrecio() ?></td>
      <td><?= $producto->getCantidad() ?></td>
      <td>
        <a class="boton2 borrar" href="../Controller/borraProductoCesta.php?codigo=<?= $producto->getCodigo() ?>">Borrar</a>
      </td>
      <td>
        <a  class="boton2 comprar" href="../Controller/compraProducto.php?codigo=<?=$producto->getCodigo()?>">Comprar</a>
      </td>
  </tr>
  <?php
  }
  ?>
  </table>
  <div class="div">
    <?php
    echo "Cantidad total de productos: ". $cantidadTotal;
    echo "<br><br>";
    echo "Precio total: ". $precioTotal;
    ?>
  </div>
  <div class="div">
    <a class="boton botonFactura" href="../Controller/factura.php?codigo=<?= $producto->getCodigo() ?>">Comprar y generar factura</a>
  </div>

</body>

</html>
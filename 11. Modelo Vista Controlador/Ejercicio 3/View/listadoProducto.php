<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Listado de articulos</title>
  <style>
    .pag_tittle {
      text-align: center;
      position: relative;
    }

    .boton {
      width: 150px;
      height: 40px;
      background-color: lightgreen;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid black;
      border-radius: 15px;
      margin: 10px;
    }
    .boton-eliminar{
      width: 150px;
      height: 40px;
      background-color: red;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid black;
      border-radius: 15px;
      margin: 10px;
      color:white;
    }
    .modificar{
      background-color: yellow;
    }
    .comprar{
      background-color: violet;
    }
    .reponer{
      background-color: lightblue;
    }

    a {
      text-decoration: none;
      color: black;
    }
    .articulo{
      background-color: lightgray;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border: 2px solid black;
      margin: 30px;
    }
    .articulo .boton{
      background-color: lightcoral;
    }
  </style>
</head>

<body>
  <h1 class="pag_tittle">LISTADO DE PRODUCTOS</h1>
  <br>
  <div class="boton">
    <a href="../Controller/nuevoProducto.php">Nuevo Producto</a>
  </div>
  <hr>
  <table border="1">
    <tr>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Stock</th>
    </tr>
    <?php
    foreach($data['productos'] as $producto)  {
    ?>
    <tr>
      <th><?=$producto->getCodigo()?></th>
      <td><?=$producto->getNombre()?></td>
      <td><?=$producto->getPrecio()?></td>
      <td><?=$producto->getStock()?></td>
      <td>
        <a class="boton-eliminar" href="../Controller/borraProducto.php?codigo=<?=$producto->getCodigo()?>">Eliminar</a>
      </td>
      <td> 
        <a class="boton modificar" href="../View/formularioModificar.php?codigo=<?=$producto->getCodigo()?>&nombre=<?=$producto->getNombre()?>&precio=<?=$producto->getPrecio()?>&stock=<?=$producto->getStock()?>">Modificar</a>
      </td>
      <td>  
        <a class="boton reponer" href="../View/formularioReponer.php?codigo=<?=$producto->getCodigo()?>&nombre=<?=$producto->getNombre()?>&precio=<?=$producto->getPrecio()?>&stock=<?=$producto->getStock()?>">Reponer</a>
      </td>
      <td>  
        <a class="boton comprar" href="../Controller/compraProducto.php?codigo=<?=$producto->getCodigo()?>&nombre=<?=$producto->getNombre()?>&precio=<?=$producto->getPrecio()?>&stock=<?=$producto->getStock()?>">Comprar</a>
      </td>
    </tr>
    <?php
    }
  ?>
</table>
  <div class="boton">
    <a href="../Controller/indexCesta.php">Ver cesta</a>
  </div>

</body>

</html>
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
    }
  </style>
</head>

<body>
  <h1 class="pag_tittle"LISTADO DE PRODUCTOS</h1>
  <br>
  <div class="boton">
    <a href="../Controller/pedido.txt">Leer factura</a>
  </div>
  <div class="boton">
    <a href="../Controller/vaciarCesta.php">Volver a la tienda</a>
  </div>

</body>

</html>
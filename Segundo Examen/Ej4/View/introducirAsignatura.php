<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      .nuevo{
        border-radius: 15px;
        display:inline-block;
        margin: 5px;
        padding:10px;
        width: 100px;
        background-color: lightblue;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <form action="../Controller/addAsignatura.php" method="POST">
      <br><h3>Nombre: <input type="text" size="40" name="nombre" required></h3>
      
      <hr>
      <input class="nuevo" type="submit" value="Aceptar">
    </form>
  </body>
</html>
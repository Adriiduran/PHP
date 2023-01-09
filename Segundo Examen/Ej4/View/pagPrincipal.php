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
    <form action="../Controller/addAlumno.php" method="POST" enctype="multipart/form-data" >
      <h3>Matrícula: </h3>
      <input type="text" size="40" name="matricula" required>
      <h3>Imagen</h3>
      <input type="file" id="imagen" name="imagen" required>
      <br><h3>Nombre: </h3>
      <input type="text" size="40" name="nombre" required>
      <br><h3>Apellidos: </h3>
      <input type="text" size="40" name="apellidos" required>
      <br><h3>Curso: </h3>
      <select name="curso" required>
        <option value="2ºDAW">2ºDAW</option>
        <option value="1ºBachillerato">1ºBachillerato</option>
      </select>
      <hr>
      <input class="nuevo" type="submit" value="Aceptar">
    </form>
  </body>
</html>
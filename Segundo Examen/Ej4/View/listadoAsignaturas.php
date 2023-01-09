<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Listado de asignaturas</title>
    <style>
      body{
        margin: 20px;
      }
      table, tr,td, th{
        border: 1px solid black;
      }
      .nuevo{
        width: 130px;
        background-color: lightgreen;
      }
      .eliminar{
        background-color: rgb(255, 153, 153);
      }
      .volver{
        width: 50px;
        background-color: lightblue;
      }
      a{
        border-radius: 15px;
        display:inline-block;
        margin: 5px;
        padding:10px;
        width: 60px;
        background-color: lightblue;
        text-decoration: none;
        color: black;
      }

    </style>
  </head>
  <body>
  <h1>Listado de asignaturas</h1>
  <a class="nuevo" href="../Controller/nuevaAsignatura.php">Nueva Asignatura</a>
  <hr>
  <table>
  <?php
    foreach($data['asignaturas'] as $asignatura)  {
    ?>
    <tr>
      <th><?=$asignatura->getCodigo()?></th>
      <td><?=$asignatura->getFecha()?></td>
      <td><?=$asignatura->getNombre()?></td>
      <td><a class="eliminar" href="../Controller/borrarAsignatura.php?codigo=<?=$asignatura->getCodigo()?>">Eliminar</a></td>
    </tr>
    <?php
    }
  ?>
  </table>
  <a class="volver" href="../Controller/index.php">Volver</a>
  </body>
</html>
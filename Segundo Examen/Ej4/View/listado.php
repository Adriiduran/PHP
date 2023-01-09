<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Alumnos</title>
    <style>
      body{
        margin: 20px;
      }
      table, tr,td, th{
        border: 1px solid black;
      }
      .nuevo{
        width: 100px;
        background-color: lightgreen;
      }
      .asignatura{
        width: 80px;
        background-color: rgb(255, 153, 153);
      }
      .alumnos{
        background-color:purple;
        color:white;
      }
      a{
        border-radius: 15px;
        display:inline-block;
        margin: 5px;
        padding:10px;
        background-color: lightblue;
        text-decoration: none;
        color: black;
      }

    </style>
  </head>
  <body>
  <h1>Listado de Alumnos</h1>
  <a class="nuevo" href="../Controller/nuevoAlumno.php">Nuevo Alumno</a>
  <a class="asignatura" href="../Controller/muestraAsignaturas.php">Asignaturas</a>
  <hr>
  <table>
  <?php
    foreach($data['alumnos'] as $alumno)  {
    ?>
    <tr>
      <th><?=$alumno->getMatricula()?></th>
      <th><img src="../View/images/<?=$alumno->getImagen()?>" width="50"></th>
      <td><?=$alumno->getNombre()?></td>
      <td><?=$alumno->getApellidos()?></td>
      <td><?=$alumno->getCurso()?></td>
      <td><a href="../View/formularioModificar.php?matricula=<?=$alumno->getMatricula()?>&nombre=<?=$alumno->getNombre()?>&apellidos=<?=$alumno->getApellidos()?>&curso=<?=$alumno->getCurso()?>">Detalles</a></td>
    </tr>
    <?php
    }
  ?>
  </table>
  <hr>
  <a class="alumnos" href="../Controller/imprimirAlumnos.php?">Imprimir lista Alumnos</a>
  </body>
</html>
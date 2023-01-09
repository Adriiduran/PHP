<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      body{
        margin: 20px;
      }
      .nuevo{
        border-radius: 15px;
        display:inline-block;
        margin: 5px;
        padding:10px;
        width: 100px;
        background-color: lightblue;
        text-decoration: none;
        color: black;
      }
      .volver{
        border-radius: 15px;
        display:inline-block;
        margin: 5px;
        padding:10px;
        width: 50px;
        background-color: rgb(255, 153, 153);
        text-decoration: none;
        color: black;
      }
    </style>
  </head>
  <body>
    <?php
    require_once '../Model/asignatura.php';
    // Obtiene todas las asignaturas
    $data['asignaturas'] = Asignatura::getAsignaturas();

    require_once '../Model/alumno-asignatura.php';
    // Obtiene todas las asignaturas
    $data['asignaturasMatriculado'] = AlumnoAsignatura::getAsignaturasMatriculado();

    $matricula=$_GET['matricula'];
    $nombre=$_GET['nombre'];
    $apellidos=$_GET['apellidos'];
    $curso=$_GET['curso'];
    ?>

    
    <form action="../Controller/matricularAlumno.php" method="POST">
      <h3>Matricula: <?=$matricula?></h3>
      <input type="hidden" name="matricula" value="<?=$matricula?>">
      <h3>Nombre: <?=$nombre?></h3>
      <input type="hidden" name="nombre" value="<?=$nombre?>">
      <h3>Apellidos: <?=$apellidos?></h3>
      <input type="hidden" name="apellidos" value="<?=$apellidos?>">
      <h3>Curso: <?=$curso?></h3>
      <input type="hidden" name="curso" value="<?=$curso?>">
      <!-- DESPLEGABLE CON ASIGNATURAS -->
      <select name="matricularAsignatura">
      <?php
        foreach($data['asignaturas'] as $asignatura)  {
      ?>
        <option value="<?=$asignatura->getNombre()?>"><?=$asignatura->getNombre()?></option>
      <?php
        }
      ?>
      </select>
      <input class="nuevo" type="submit" value="Matricular">
    </form>


      <br>
      <form action="../Controller/borrarAsignaturaMatriculada.php" method="POST">
      <!-- ASIGNATURAS MATRICULADO -->
      <h3>ASIGNATURAS MATRICULADAS</h3>
      <ul>
      <?php
        foreach($data['asignaturasMatriculado'] as $asignatura)  {
      if(($asignatura->getMatricula())==$matricula){
      ?>
          <li><?=$asignatura->getCasignatura()?><a class="nuevo" href="../Controller/borrarAsignaturaMatriculada.php?matricula=<?=$matricula?>&nombre=<?=$nombre?>&apellidos=<?=$apellidos?>&curso=<?=$curso?>&asignatura=<?=$asignatura->getCasignatura()?>">Desmatricular</a></li>
      <?php
      }
      }
      ?>
      </ul>
        <hr>
      <a class="volver" href="../Controller/index.php">Volver</a>
    
  </body>
</html>
<?php 
    include_once '../Model/EscuelaDB.php';

    $conexion = EscuelaDB::connectDB();
    $sql = "insert into asignaturasalumno (id,codigo,matricula) values (NULL ,'".$_POST['asignatura']."','".$_POST['matricula']."')";
    $consulta = $conexion->exec($sql);


    header('Location: ../index.php');   
?>
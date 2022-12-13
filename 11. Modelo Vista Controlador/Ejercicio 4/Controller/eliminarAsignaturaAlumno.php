<?php 
    include_once '../Model/EscuelaDB.php';

    $conexion = EscuelaDB::connectDB();
    $sql = "delete from asignaturasalumno where codigo='".$_GET['codigo']."' and matricula='".$_GET['matricula']."'";
    $conexion->exec($sql);

    header("Location: ./detallesAlumno.php?matricula=".$_GET['matricula']."");
?>
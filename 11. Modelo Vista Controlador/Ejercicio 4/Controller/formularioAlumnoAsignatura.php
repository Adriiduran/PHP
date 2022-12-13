<?php 
    include_once '../Model/Asignatura.php';

    $data['matricula'] = $_GET['matricula'];

    $conexion = EscuelaDB::connectDB();
    $sql = "select * from asignaturas as a where a.codigo not in (SELECT a.codigo from asignaturas inner join asignaturasalumno as aa on a.codigo = aa.codigo where aa.matricula='".$_GET['matricula']."');";
    $consulta = $conexion->query($sql);

    $data['asignaturasDisponibles'] = [];

    while ($registro = $consulta->fetchObject()) {
        $asignatura = new Asignatura($registro->nombre);
        $asignatura->setcodigo($registro->codigo);
        $data['asignaturasDisponibles'][] = $asignatura;
    }

    include '../View/formularioAlumnoAsignatura.php';
?>
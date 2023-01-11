<?php 
    include_once '../Model/Alumno.php';
    include_once '../Model/Asignatura.php';

    if (isset($_POST['curso'])) {
        $curso = $_POST['curso'];
        $data['lista'] = Alumno::getAlumnosByCurso($curso);
    }
    else if (isset($_POST['cadena'])) {
        $cadena = $_POST['cadena'];
        $data['lista'] = Alumno::getAlumnosByNombre($cadena);
    }
    else if (isset($_POST['matricula'])) {
        $matricula = $_POST['matricula'];
        $data['lista'] = Asignatura::getAsignaturasPorAlumno($matricula);
    }
    else if (isset($_POST['matricula2']) && isset($_POST['codigo'])) {
        $matricula = $_POST['matricula2'];
        $codigo = $_POST['codigo'];

        Alumno::matricularAlumno($matricula,$codigo);

        $data['lista'] = "ALUMNO MATRICULADO CORRECTAMENTE";
    }
    else if (isset($_POST['matricula3']) && isset($_POST['grupo'])) {
        $matricula = $_POST['matricula3'];
        $grupo = $_POST['grupo'];

        Alumno::cambioGrupo($matricula,$grupo);

        $data['lista'] = "CAMBIO DE GRUPO CORRECTO";
    }
    else if (isset($_POST['matricula4'])) {
        $matricula = $_POST['matricula4'];

        Alumno::delete($matricula);

        $data['lista'] = "ALUMNO ELIMINADO CORRECTAMENTE";
    }

    echo httpResponse(http_response_code()) . "<br>";

    include '../View/MostrarLista.php';

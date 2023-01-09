<?php
include_once '../Model/Usuario.php';
include_once '../Model/Cita.php';

if (isset($_GET['medico'])) {
    $medico = $_GET['medico'];
    session_start();
    $_SESSION['medico'] = $medico;
    $fecha = date("Y-m-d", strtotime("+1 day"));
    $_SESSION['fecha'] = $fecha;

    include '../View/vistaCitasMedico.php';
}
else{
    $conexion = HospitalDB::connectDB();
    $sqlMedico = "SELECT id FROM usuario WHERE nombre='" . $medico . "'";
    $idMedico = $conexion->query($sqlMedico)->fetchObject();
    $resultado = Cita::getCitaById($_SESSION['usuario']->id,$idMedico,$_SESSION['fecha']);

    if ($resultado == true) {
        include '../View/vistaAnularCita.php';
    }
    else{
        include '../View/vistaCitasMedico.php';
    }

}

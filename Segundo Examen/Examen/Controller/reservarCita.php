<?php
include_once '../Model/Cita.php';
include_once '../Model/Usuario.php';
session_start();

$usuario = unserialize($_SESSION['usuario']);
$medico = $_SESSION['medico'];
$fecha = $_SESSION['fecha'];
$hora = $_GET['hora'];

$conexion = HospitalDB::connectDB();
$sqlMedico = "SELECT id FROM usuario WHERE nombre='".$medico."'";
$idMedico = $conexion->query($sqlMedico)->fetchObject();

$sql = "INSERT INTO cita (paciente,medico,fecha,hora) VALUES (".$usuario->getId().",".$idMedico->id.",'".$fecha."',".$hora.")";
$conexion->exec($sql);

include '../Controller/recogeDatosUsuario.php';
?>

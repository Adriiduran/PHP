<?php
$usuario = unserialize($_SESSION['usuario']);
$medico = $_SESSION['medico'];
$fecha = $_SESSION['fecha'];

$conexion = HospitalDB::connectDB();
$sqlMedico = "SELECT id FROM usuario WHERE nombre='".$medico."'";
$idMedico = $conexion->query($sqlMedico)->fetchObject();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CITAS MEDICO</title>
    <style>
        table,tr,td,th{
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>USUARIO: <?= $usuario->getNombre() ?> - Visitas: <?= $_COOKIE['' . $usuario->getNombre() . ''] ?></h1>
        <br>
        <h3>MEDICO: <?=$medico?> - Fecha: <?=$fecha?></h3>
        <table>
            <thead>
                <tr>
                    <th>HORA</th>
                    <th>RESERVAR</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    for ($i=8; $i < 16; $i++) { 
                        $resultado = Cita::citaOcupada($idMedico->id,$fecha,$i);

                        if ($resultado == true) {
                            $td = 'OCUPADO';
                        }
                        else{
                            $td = '<a href="../Controller/reservarCita.php?hora='.$i.'">RESERVAR</a>';
                        }
                        ?>
                        <tr>
                            <td><?=$i?>:00h</td>
                            <td><?=$td?></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <a href="../Controller/recogeDatosUsuario.php">VOLVER AL LISTADO DE MÉDICOS</a>
    </div>
</body>

</html>
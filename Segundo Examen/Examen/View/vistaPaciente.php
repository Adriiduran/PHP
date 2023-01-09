<?php 
    $usuario = unserialize($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISTA PACIENTE</title>
    <style>
        table,tr,th,td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>USUARIO: <?=$usuario->getNombre()?> - Visitas: <?=$_COOKIE[''.$usuario->getNombre().'']?></h1>
        <table>
            <thead>
                <tr>
                    <th>Medico</th>
                    <th>CITAS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Fernando</td><td><a href="../Controller/citasMedico.php?medico=Fernando">RESERVAR CITA</a></td>
                </tr>
                <tr>
                    <td>Ruben</td><td><a href="../Controller/citasMedico.php?medico=Ruben">RESERVAR CITA</a></td>
                </tr>
                <tr>
                    <td>Patricia</td><td><a href="../Controller/citasMedico.php?medico=Patricia">RESERVAR CITA</a></td>
                </tr>
                <tr>
                    <td>Carlos</td><td><a href="../Controller/citasMedico.php?medico=Carlos">RESERVAR CITA</a></td>
                </tr>
            </tbody>
        </table>

        <a href="../Controller/cerrarSesion.php">CERRAR SESIÓN</a>
        <a href="../Controller/exportarCitas.php">EXPORTAR CITAS</a>
    </div>
</body>
</html>
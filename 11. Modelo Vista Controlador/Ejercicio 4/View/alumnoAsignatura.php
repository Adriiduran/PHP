<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETALLES DE ALUMNO</title>
</head>
<style>
    table{
        width: 80%;
        margin: 20px auto;
    }

    th,tr,td{
        border: 1px solid black;
    }

    th,td{
        padding: 10px;
    }

    body{
        text-align: center;
    }
</style>
<body>
<header>
        <h1>LISTADO DE ASIGNATURAS PARA <?=mb_strtoupper($data['detalleAlumno']->getnombre())?></h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (count($data['detalleAsignatura']) == 0) {
                    echo '<h2>NO HAY ASIGNATURAS REGISTRADAS PARA ESTE ALUMNO</h2>';
                }
                else{
                foreach ($data['detalleAsignatura'] as $asignatura) {
                ?>
                    <tr>
                        <td><?= $asignatura->getcodigo() ?></td>
                        <td><?= $asignatura->getnombre() ?></td>
                        <td><a href="./eliminarAsignaturaAlumno.php?matricula=<?=$data['detalleAlumno']->getmatricula()?>&codigo=<?=$asignatura->getcodigo()?>">Eliminar</a></td>
                    </tr>

                <?php
                }}
                ?>
            </tbody>
        </table>

        <section>
            <a href="../index.php">Volver</a>
            <a href="./formularioAlumnoAsignatura.php?matricula=<?=$data['detalleAlumno']->getmatricula()?>">Añadir asignatura</a>
        </section>
</body>
</html>
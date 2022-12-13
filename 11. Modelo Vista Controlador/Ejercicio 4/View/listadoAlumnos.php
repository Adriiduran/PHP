<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTADO DE ALUMNOS</title>
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
        <h1>LISTADO DE ALUMNOS</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>MATRICULA</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>CURSO</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (count($data['alumnos']) == 0) {
                    echo '<h2>NO HAY ALUMNOS REGISTRADOS</h2>';
                }
                else{
                foreach ($data['alumnos'] as $alumno) {

                ?>
                    <tr>
                        <td><?= $alumno->getmatricula() ?></td>
                        <td><?= $alumno->getnombre() ?></td>
                        <td><?= $alumno->getapellidos() ?></td>
                        <td><?= $alumno->getcurso() ?></td>
                        <td><a href="./Controller/detallesAlumno.php?matricula=<?=$alumno->getmatricula()?>">Ver Detalles</a></td>
                    </tr>

                <?php
                }}
                ?>
            </tbody>
        </table>

        <section>
            <a href="./Controller/nuevoAlumno.php">Nuevo Alumno</a>
            <a href="./Controller/mostrarAsignaturas.php">Mostrar Asignaturas</a>
        </section>

    </main>

</body>

</html>
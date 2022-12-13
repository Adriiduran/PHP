<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTADO DE ASIGNATURAS</title>
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
        <h1>LISTADO DE ASGINATURAS</h1>
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
                if (count($data['asignaturas']) == 0) {
                    echo '<h2>NO HAY ASIGNATURAS REGISTRADAS</h2>';
                }
                else{
                foreach ($data['asignaturas'] as $asignatura) {

                ?>
                    <tr>
                        <td><?= $asignatura->getcodigo() ?></td>
                        <td><?= $asignatura->getnombre() ?></td>
                        <td><a href="./eliminarAsignatura.php?codigo=<?=$asignatura->getcodigo()?>&nombre=<?=$asignatura->getnombre()?>">Eliminar</a></td>
                    </tr>

                <?php
                }}
                ?>
            </tbody>
        </table>

        <section>
            <a href="./mostrarFormularioAsignaturas.php">Añadir Asignatura</a>
            <a href="../index.php">Volver</a>
        </section>

    </main>

</body>

</html>
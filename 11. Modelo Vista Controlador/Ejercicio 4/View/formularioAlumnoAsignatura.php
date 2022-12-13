<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Alumno</title>
</head>
<body>
    <h1>ALTA DE ASIGNATURA</h1>
    <form action="./grabaAsignaturaAlumno.php" method="POST">
        <h3>Selecciona una asignatura</h3>
        <select name="asignatura">
            <?php 
                foreach ($data['asignaturasDisponibles'] as $asignatura) {
                    ?>
                    <option value="<?=$asignatura->getcodigo()?>" selected><?=$asignatura->getnombre()?></option>
                    <?php
                }
            ?>
        </select>
        <input type="hidden" name="matricula" value="<?=$data['matricula']?>">
        <input type="submit" value="AÑADIR">
    </form>
</body>
</html>
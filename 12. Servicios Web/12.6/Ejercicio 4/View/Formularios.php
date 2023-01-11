<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Obtener alumnos de un grupo pasado por parámetro</h2>
    <form action="../Controller/ProcesarFormulario.php" method="post">
        <h3>Introduce el curso</h3>
        <input type="text" name="curso" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <h2>Alumnos cuyo nombre contenga el parámetro introducido</h2>
    <form action="../Controller/ProcesarFormulario.php" method="post">
        <h3>Introduce el nombre</h3>
        <input type="text" name="cadena" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <h2>Asignaturas de un alumno</h2>
    <form action="../Controller/ProcesarFormulario.php" method="post">
        <h3>Introduce la matrícula del alumno</h3>
        <input type="text" name="matricula" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <h2>Matriculación de un alumno en una asignatura</h2>
    <form action="../Controller/ProcesarFormulario.php" method="post">
        <h3>Introduce la matricula</h3>
        <input type="text" name="matricula2" required>
        <h3>Introduce el codigo de la asignatura</h3>
        <input type="text" name="codigo" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <h2>Cambio de un grupo de un alumno</h2>
    <form action="../Controller/ProcesarFormulario.php" method="post">
        <h3>Introduce la matricula</h3>
        <input type="text" name="matricula3" required>
        <h3>Introduce el grupo</h3>
        <input type="text" name="grupo" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <h2>Borrar alumno</h2>
    <form action="../Controller/ProcesarFormulario.php" method="post">
        <h3>Introduce la matricula</h3>
        <input type="text" name="matricula4" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
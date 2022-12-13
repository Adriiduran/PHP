<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Alumno</title>
</head>
<body>
    <form action="./grabaAlumno.php" method="POST">
        <h3>Matricula</h3>
        <input type="text" name="matricula" required minlength="1">
        <h3>Nombre</h3>
        <input type="text" name="nombre" required minlength="3">
        <h3>Apellidos</h3>
        <input type="text" name="apellidos" required minlength="5">
        <h3>Curso</h3>
        <select name="curso" required>
            <option value="1 ESO">1 ESO</option>
            <option value="2 ESO">2 ESO</option>
            <option value="3 ESO">3 ESO</option>
            <option value="4 ESO">4 ESO</option>
            <option value="1 BAHILLERATO">1 BACHILLERATO</option>
            <option value="2 BAHILLERATO">2 BACHILLERATO</option>
            <option value="1 DAW">1 DAW</option>
            <option value="2 DAW">2 DAW</option>
        </select>
        <br> <br>
        <input type="submit" value="MATRICULAR">
    </form>
</body>
</html>
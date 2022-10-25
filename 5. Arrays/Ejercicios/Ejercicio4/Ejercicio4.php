<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
</head>

<body>
    <h1>CUPIDO HA LLEGADO A LA WEB</h1>
    <?php
    if (isset($_GET['array'])) {
        $array = $_GET['array'];
    } 
    else {
        $array = "";
    }

    echo '<form action="./Ejercicio4-Validacion.php">
            <fieldset>
                <legend>Añadir personas a la Base de datos</legend>
                <label for="">NOMBRE</label>
                <input type="text" name="nombre" required="required"><br>
                <hr><br>
                <label for="">SEXO</label>
                <input type="radio" name="sexo" value="hombre" required>Hombre
                <input type="radio" name="sexo" value="mujer">Mujer
                <br>
                <hr><br>
                <label for="">ORIENTACIÓN</label>
                <input type="radio" name="orientacion" value="hetero" required>Heterosexual
                <input type="radio" name="orientacion" value"homo">Homosexual
                <input type="radio" name="orientacion" value="bi">Bisexual
                <br>
                <hr><br>
                <input type="submit" value="AÑADIR PERSONA">
            </fieldset>
            <input type="hidden" name="oculto" value="'.$array.'">
        </form>
        <br>';

    echo '<fieldset>
            <legend>Pasar a generar las parejas</legend>
            <form action="Ejercicio4-Final.php">
                <input type="hidden" name="oculto" value="'.$array.'">
                <input type="submit" value="CUPIDO ENTRA EN ACCIÓN">
            </form>
          </fieldset>';
    ?>


</body>

</html>
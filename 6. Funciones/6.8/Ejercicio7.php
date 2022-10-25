<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php 
        /*Verificar si en una frase se encuentra una determinada palabra pedida al usuario.*/

        $texto = 'Esto es un texto de prueba para comprombar que una existe dentro desde este texto una palabra introducida por el usuario';

        echo '<h1>'.$texto.'</h1>';

        if (isset($_GET['palabra'])) {
            $palabra = $_GET['palabra'];

            $array = explode(" ",$texto);
            $bandera = false;

            //comprueba si la palabra del usuario se encuentra dentro del texto de prueba
            foreach ($array as $key) {
                if ($key == $palabra) {
                    $bandera = true;
                }
            }

            if ($bandera == true) {
                echo 'LA PALABRA INTRODUCIDA SE ENCUENTRA EN EL TEXTO <br><br>';
            }
            else{
                echo 'LA PALABRA INTRODUCIDA NO SE ENCUENTRA EN EL TEXTO <br><br>';
            }
        }
    ?>

    <form action="Ejercicio7.php">
        <input type="text" name="palabra" required>
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>
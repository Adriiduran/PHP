<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        /*Cambiar todas las vocales de la frase “Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar” por otra vocal pedida al usuario.*/

        $texto = 'Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar';

        if (isset($_GET['vocal'])) {
            $vocal = $_GET['vocal']; //vocal elegida por el usuario
            $arrayVocales = array('a','e','i','o','u');

            for ($i=0; $i < count($arrayVocales); $i++) { 
                $texto = str_replace($arrayVocales[$i], $vocal, $texto); //reemplaza cada vocal por la elegida por el usuario
            }
        }
        
        echo '<h1>'.$texto.'</h1>';
    ?>

    <form action="Ejercicio2.php">
        <label for="vocal">Introduzca una vocal para cambiar el texto</label>
        <input type="text" name="vocal">
        <input type="submit" value="Cambiar">
    </form>
</body>
</html>
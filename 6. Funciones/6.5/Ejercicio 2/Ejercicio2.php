<!--Disponemos de 2 tarjetas de coordenadas para controlar el acceso a una web. Cada tarjeta corresponde a un perfil de usuario ‘admin’ o ‘estandar’, cada número número registrado en la tarjeta se identifica por su fila (de la 1 a la 5) y su columna (de la A a la E). Los valores registrados en cada tarjeta son fijos y os lo podéis inventar.
Crea una página principal que sirva de control de acceso a una segunda página. Se pedirá el perfil de usuario (admin o estándar) y una clave aleatoria correspondiente a la tarjeta de coordenadas de su perfil (fila y columna), se comprobará si es correcto usando 2 funciones: dameTarjeta() a la que se le pasa el perfil y devuelve una matriz correspondiente a la tarjeta de coordenadas de ese perfil, y compruebaClave() a la que se le pasa la matriz de coordenadas, las coordenadas y un valor, y devolverá un booleano según sea correcto el valor en la matriz de coordenadas. Ambas funciones estarán almacenadas en una librería controlAcceso.php.
Si el usuario se ha identificado correctamente se muestra un enlace de acceso a la página protegida (cualquiera) y si no mostrará un enlace para volver a intentarlo de nuevo.
Usar una tercera función imprimeTarjeta() que recibe una tarjeta y la imprime en una tabla para comprobar el valor de todas las coordenadas. (imprimir las tarjetas de cada perfil en la página de acceso para poder comprobar el correcto funcionamiento de la página)-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php 
        include 'controlAcceso.php'; //incluye las funciones del archivo controlAcceso.php para poder utiizarlas en este archivo

        $arrayFilas = array(1,2,3,4,5);
        $arrayColumnas = array('A','B','C','D','E');
        $aleatorios = array(rand(0,4),rand(0,4));

        echo 'Array Estandar: <br>';

        imprimeTarjeta(dameTarjeta("estandar"));

        echo 'Array Admin: <br>';

        imprimeTarjeta(dameTarjeta("admin"));
    ?>

    <form action="./Ejercicio2-Validacion.php">
        <label for="usuario">Elige un tipo de usuario</label>
        <select name="tipoUsuario">
            <option value="admin">Admin</option>
            <option value="estandar" selected>Estandar</option>
        </select>
        <br>
        <label for="coor">Introduce la coordenada <?php echo $arrayFilas[$aleatorios[0]].$arrayColumnas[$aleatorios[1]]; //selecciona una coordenada aleatoriamente?></label>
        <input type="text" name="clave" required>
        <br>
        <input type="submit" value="Entrar">
        <input type="hidden" name="aleatorios" value="<?php echo serialize($aleatorios); //función para poder pasar array como parametros de una URL?>">
    </form>
    
</body>
</html>
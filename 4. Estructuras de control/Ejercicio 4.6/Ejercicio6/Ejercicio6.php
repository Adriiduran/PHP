<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>
</head>

<body>
    <?php
        for ($i=1; $i < 10; $i++) { 
            echo '<a href="../Ejercicio1/Ejercicio1.php?num='.$i.'"><img src="../Ejercicio1/images/oculto.jpg"></a>';
            if ($i % 3 == 0) {
                echo '<br>';
            }
        }
    ?>

    <form action="../Ejercicio1/Ejercicio1.php" method="get">
        <input type="text" name="nombre">
        <button type="submit">Enviar</button>
    </form>
</body>

</html>
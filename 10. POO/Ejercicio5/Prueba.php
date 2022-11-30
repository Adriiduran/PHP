<?php 
    include_once 'Canario.php';
    include_once 'Pinguino.php';
    include_once 'Lagarto.php';
    include_once 'Perro.php';
    include_once 'Gato.php';

    $perro = new Perro("macho", "perro", "beagle");
    $gato = new Gato("hembra", "gato", "persa");
    $lagarto = new Lagarto("hembra", "lagartija");
    $canario = new Canario("macho","canario","verde");
    $pinguino = new Pinguino("hembra", "emperador");
?>
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
        echo $perro.'<br>';
        echo $gato->duerme();
        echo $lagarto->tomarElSol().'<br>';
        echo $canario->Cantar().'<br>';
        echo $pinguino->deszilarse();
    ?>
</body>
</html>
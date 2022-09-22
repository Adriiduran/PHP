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
        $diametro = $_GET['diametro'];
        $altura = $_GET['altura'];
        $caudal = $_GET['caudal'];

        $resultado = round(((pi()*$altura*(pow($diametro/2,2)))/$caudal)/60,3);
        $decimales = explode(".",$resultado);
    ?>

    <h2><?php echo $decimales[0], " horas y ",floor($decimales[1]/24)," minutos"; ?></h2>
</body>
</html>
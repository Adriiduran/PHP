<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            text-align: center;
        }
    </style>
</head>
<body>

    <?php  
        $tienda1 = $_GET['tienda1'];
        $tienda2 = $_GET['tienda2'];
        $tienda3 = $_GET['tienda3'];
        $media = ($tienda1+$tienda2+$tienda3)/3;
    ?>

    <table border=1>
        <legend>Información sobre las tiendas</legend>
        <thead>
            <tr><th></th><th>Precio</th><th>Precio Medio</th><th>Diferencia</th></tr>
        </thead>
        <tbody>
            <tr><th>Tienda 1</th><td><?php echo $tienda1?></td><td rowspan="3"><?php echo $media?></td><td><?php echo $tienda1-$media?></td></tr>
            <tr><th>Tienda 2</th><td><?php echo $tienda2?></td><td><?php echo $tienda2-$media?></td></tr>
            <tr><th>Tienda 3</th><td><?php echo $tienda3?></td><td><?php echo $tienda3-$media?></td></tr>
        </tbody>
    </table>
</body>
</html>
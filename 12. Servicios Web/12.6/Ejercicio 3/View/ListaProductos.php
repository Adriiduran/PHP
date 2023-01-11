<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA PRODUCTOS</title>
</head>
<body>
    <?php 
        if ($_SESSION['lista'] == "") {
            echo "No se han encontrado productos";
        }
        else{
            echo json_encode(implode("<br>",unserialize($_SESSION['lista'])));
        }
    ?>
    <br>
    <a href="../Controller/Login.php">Volver</a>
</body>
</html>
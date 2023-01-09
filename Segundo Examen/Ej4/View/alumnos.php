<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td, th{
            border: solid black 1px;
            text-align:center;
        }
        .nuevo{
        border-radius: 15px;
        display:inline-block;
        margin: 5px;
        padding:10px;
        width: 100px;
        background-color: lightblue;
        text-decoration: none;
      }
    </style>
</head>
<body>
    <?php
    $file = "alumnos.txt";
    $fp = fopen($file, "r");
    $contents = fread($fp, filesize($file));
    echo $contents;
    fclose($fp);
    ?>
    <form action="../Controller/index.php">
        <input class="nuevo" type="submit" value="Volver al inicio">
    </form>
</body>
</html>
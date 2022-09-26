<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Combinación ganadora</th>
                <th>Combinación usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $num1 = $_GET["num1"];
                $num2 = $_GET["num2"];
                $num3 = $_GET["num3"];
                $num4 = $_GET["num4"];
                $num5 = $_GET["num5"];
                $num6 = $_GET["num6"];
                $serie = $_GET["serie"];

                echo "<tr><td>",rand(1,49),"</td><td>",$num1,"</td></tr>";
                echo "<tr><td>",rand(1,49),"</td><td>",$num2,"</td></tr>";
                echo "<tr><td>",rand(1,49),"</td><td>",$num3,"</td></tr>";
                echo "<tr><td>",rand(1,49),"</td><td>",$num4,"</td></tr>";
                echo "<tr><td>",rand(1,49),"</td><td>",$num5,"</td></tr>";
                echo "<tr><td>",rand(1,49),"</td><td>",$num6,"</td></tr>";
                echo "<tr><td>",rand(1,999),"</td><td>",$serie,"</td></tr>";
            ?>
        </tbody>
    </table>
</body>
</html>
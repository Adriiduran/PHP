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
    $num1 = rand(1,50);
    $num2 = rand(1,50);
    $num3 = rand(1,50);
    $num4 = rand(1,50);
    $num5 = rand(1,50);
    $num6 = rand(1,50);
    $aciertos = 0;

    if (isset($_POST['submit'])) {

        if (!empty($_POST['numeros'])) {

            foreach ($_POST['numeros'] as $selected) {
                if ($selected == $num1 || $selected == $num2 || $selected == $num3 || $selected == $num4 || $selected == $num5 || $selected == $num6) {
                    $aciertos++;
                }
            }
        }
    }

    echo $aciertos; 
    
    ?>
</body>

</html>
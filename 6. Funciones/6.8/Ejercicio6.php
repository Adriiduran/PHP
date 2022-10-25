<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php 
        /*Dado un párrafo con dos frases (separadas por un punto), contar cuántas palabras tiene cada frase.*/

        $texto = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, mollitia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, mollitia";

        $numeroPalabras = str_word_count($texto);

        echo $texto,'<br> EL TEXTO TIENE '.$numeroPalabras.' PALABRAS';
    ?>
</body>
</html>
<!--Crear una página web para generar de manera aleatoria una combinación de apuesta en la lotería primitiva. Se pedirán 6 números (entre 1 y 49) y el número de serie (entre 1 y 999). El usuario podrá rellenar los números pedidos que desee, dejando en blanco el resto, de modo que la combinación generada respete los números elegidos y genere aleatoriamente el resto hasta completar la combinación (el número de serie también es opcional). El usuario también podrá rellenar de manera opcional una caja de texto como título para su combinación.
Usar una función combinacion() que sea llamada para generar la combinación en función de los parámetros recibidos y devuelva el array generado.
Usar una función imprimeApuesta() que reciba un array y un texto, e imprima en una tabla html con el formato que quieras, el array generado con el texto de cabecera, para mostrar el resultado de la combinación generada. Si la función no recibe ningún texto como cabecera imprimirá "Combinación generada para la Primitiva".-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <form action="./Ejercicio1-Validacion.php">
        <label for="Num1">Numero 1</label>
        <input type="number" max="49" min="1" name="num1">
        <label for="Num2">Numero 2</label>
        <input type="number" max="49" min="1" name="num2">
        <label for="Num3">Numero 3</label>
        <input type="number" max="49" min="1" name="num3">
        <label for="Num4">Numero 4</label>
        <input type="number" max="49" min="1" name="num4">
        <label for="Num5">Numero 5</label>
        <input type="number" max="49" min="1" name="num5">
        <label for="Num6">Numero 6</label>
        <input type="number" max="49" min="1" name="num6">
        <label for="Serie">Número Serie</label>
        <input type="number" max="999" min="1" name="serie"> <br>
        <label for="titulo">Introduce un titulo para tu combinación</label>
        <input type="text" name="titulo"> <br>
        <input type="submit">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5,6,9</title>
    <link rel="stylesheet" href="Ejercicio5.css">
</head>

<body>
    <?php
    //Se añade el producto a las cookies
    if (isset($_GET['nombreAlta'])) {
        $arrayProductos = unserialize(base64_decode($_COOKIE['productos']));

        array_push($arrayProductos, array(strtoupper($_GET['nombreAlta']), $_GET['precioAlta'], $_GET['linkImagen'], $_GET['descripcion']));

        setcookie('productos', base64_encode(serialize($arrayProductos)), time() + 3600, "/");

        array_push($_SESSION['carrito'], strtoupper($_GET['nombreAlta']));

        header('Location: ./Ejercicio5.php');
    }

    //Se elimina el producto de las cookies
    else if (isset($_GET['nombreBaja'])) {
        $arrayProductos = unserialize(base64_decode($_COOKIE['productos']));
        $arrayTemporal = array();
        $arrayTemporal2 = array();

        for ($i = 0; $i < count($arrayProductos); $i++) {
            if ($_GET['nombreBaja'] != $arrayProductos[$i][0]) {
                array_push($arrayTemporal, $arrayProductos[$i]);
            }
        }

        for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
            if ($_GET['nombreBaja'] != $_SESSION['carrito'][$i]) {
                array_push($arrayTemporal, $arrayProductos[$i]);
            }
        }

        setcookie('productos', base64_encode(serialize($arrayTemporal)), time() + 3600, "/");

        header('Location: ./Ejercicio5.php');
    }


    if (isset($_GET['accion']) || isset($_GET['baja'])) {
        //Formulario para dar de alta un producto
        if ($_GET['accion'] == "alta") {
            echo '<form action="./Ejercicio5-Validacion.php">
            <label for="">Introduce el nombre del producto</label>
            <input type="text" name="nombreAlta" required><br>
            <label for="">Introduce el precio del producto</label>
            <input type="number" name="precioAlta" min="1" required><br>
            <label for="">Introduce el link de la imagen</label>
            <input type="text" name="linkImagen" required><br>
            <label for="">Introduce la descripcion del producto</label>
            <input type="text" name="descripcion" required><br>
            <input type="submit" value="Dar de alta">
            </form>';
        }

        //Muestra de todos los productos para dar de baja mediante un clic
        else if ($_GET['accion'] == 'baja') {
            $arrayProductos = unserialize(base64_decode($_COOKIE['productos']));

            echo '<div class="producto">';

            for ($i = 0; $i < count($arrayProductos); $i++) {
                echo '<div class="producto">
                <img src="' . $arrayProductos[$i][2] . '"></img>
                <p>' . $arrayProductos[$i][0] . '</p>
        <a href="./Ejercicio5-Validacion.php?nombreBaja=' . $arrayProductos[$i][0] . '">Dar de baja</a></div>';
            }


            echo '</div>';
        }
    }
    ?>


</body>

</html>
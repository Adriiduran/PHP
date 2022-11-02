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
    session_start();

    //Se añade el producto a las cookies y crea la entrada en el carrito
    if (isset($_GET['nombreAlta'])) {
        $arrayProductos = unserialize(base64_decode($_COOKIE['productos']));

        //Añade el producto al array de los productos
        array_push($arrayProductos, array(strtoupper($_GET['nombreAlta']), $_GET['precioAlta'], $_GET['linkImagen'], $_GET['descripcion']));

        //Actuliza las cookies con el nuevo array de productos
        setcookie('productos', base64_encode(serialize($arrayProductos)), time() + 3600, "/");

        //Actualiza la sesión con el nuevo producto al carrito
        array_push($_SESSION['carrito'], array(strtoupper($_GET['nombreAlta']), 0));

        header('Location: ./Ejercicio5.php');
    }

    //Se elimina el producto de las cookies y elimina la entrada del carrito
    else if (isset($_GET['nombreBaja'])) {
        $arrayProductos = unserialize(base64_decode($_COOKIE['productos']));
        $arrayTemporal = array();
        $arrayTemporal2 = array();

        //Elimina el producto seleccionado de las cookies
        for ($i = 0; $i < count($arrayProductos); $i++) {
            if ($_GET['nombreBaja'] != $arrayProductos[$i][0]) {
                array_push($arrayTemporal, $arrayProductos[$i]);
            }
        }

        //Elimina el producto seleccionado de la sesion
        for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
            if ($_GET['nombreBaja'] != $_SESSION['carrito'][$i][0]) {
                array_push($arrayTemporal2, $_SESSION['carrito'][$i]);
            }
        }

        setcookie('productos', base64_encode(serialize($arrayTemporal)), time() + 3600, "/");

        $_SESSION['carrito'] = $arrayTemporal2;

        header('Location: ./Ejercicio5.php');
    }
    else if (isset($_GET['nombreMod'])){
        //Formulario para introducir los nuevos datos del producto
        echo '<form action="./Ejercicio5-Validacion.php">
            <label for="">Introduce el nombre del producto</label>
            <input type="text" name="nombreMod" required><br>
            <label for="">Introduce el precio del producto</label>
            <input type="number" name="precioMod" min="1" required><br>
            <label for="">Introduce el link de la imagen</label>
            <input type="text" name="linkImagen" required><br>
            <label for="">Introduce la descripcion del producto</label>
            <input type="text" name="descripcionMod" required><br>
            <input type="hidden" name="nombre" value="'.$_GET['nombreMod'].'">
            <input type="submit" value="Dar de alta">
            </form>';
    }

    if (isset($_GET['nombre'])) {
        $arrayProductos = unserialize(base64_decode($_COOKIE['productos']));

        //Busca y sustituye todos los elementos del producto seleccionado
        for ($i = 0; $i < count($arrayProductos); $i++) {
            if ($_GET['nombre'] == $arrayProductos[$i][0]) {
                $arrayProductos[$i][0] = $_GET['nombreMod'];
                $arrayProductos[$i][1] = $_GET['precioMod']; 
                $arrayProductos[$i][2] = $_GET['linkImagen']; 
                $arrayProductos[$i][3] = $_GET['descripcionMod'];  
            }
        }

        setcookie('productos', base64_encode(serialize($arrayProductos)), time() + 3600, "/");

        header('Location: ./Ejercicio5.php');
    }


    if (isset($_GET['accion']) || isset($_GET['baja']) || isset($_GET['mod'])) {
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

        //Muestra de todos los productos para seleccionar cual modificar
        else {
            $arrayProductos = unserialize(base64_decode($_COOKIE['productos']));

            echo '<div class="producto">';

            for ($i = 0; $i < count($arrayProductos); $i++) {
                echo '<div class="producto">
                <img src="' . $arrayProductos[$i][2] . '"></img>
                <p>' . $arrayProductos[$i][0] . '</p>
                <a href="./Ejercicio5-Validacion.php?nombreMod=' . $arrayProductos[$i][0] . '">Modificar</a></div>';
            }


            echo '</div>';
        }
    }
    ?>


</body>

</html>
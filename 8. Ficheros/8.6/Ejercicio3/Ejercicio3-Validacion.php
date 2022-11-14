<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO VALIDACION</title>
</head>

<body>
    <?php
    // Inicio de sesión
    session_start();

    //Obtiene los valores de los productos del fichero productos.txt
    if (!isset($_SESSION['productos'])) {
        $_SESSION['productos'] = [];

        foreach (file('productos.txt') as $linea) {
            trim($linea);
            $array = explode(",", $linea);

            array_push($_SESSION['productos'], array($array[0], $array[1], $array[2], $array[3]));
        }
    }

    if (isset($_GET['accion'])) {
        //Muestra un formulario para añadir nuevos productos
        if ($_GET['accion'] == 'añadir') {
            echo '<form action="#">
                <label>Nombre del producto</label>
                <input type="text" name="nombre"><br>
                <label>Precio del producto</label>
                <input type="number" name="precio"><br>
                <label>Introduce la imagen del producto</label>
                <input type="text" name="img"><br>
                <label>Introduce la descripcion del producto</label>
                <input type="text" name="desc"><br>
                <input type="submit" value="Añadir">
                </form>';
        } else {
            //Muestra todos los productos para poder seleccionar cual borrar
            for ($i = 0; $i < count($_SESSION['productos']); $i++) {
                echo '<p>' . $_SESSION['productos'][$i][0] . '</p><a href="./Ejercicio3-Validacion.php?eliminar=' . $_SESSION['productos'][$i][0] . '">Eliminar</a>';
            }
        }
    }

    //Si se añade nuevo producto se guarda en el fichero de productos 
    if (isset($_GET['nombre'])) {
        $archivo = fopen('productos.txt', 'a+');
        fwrite($archivo, $_GET['nombre'] . ',' . $_GET['precio'] . ',' . $_GET['img'] . ',' . $_GET['desc'] . "\n");
        fclose($archivo);
        header('Location: ./Ejercicio3.php?productoNuevo=');
    }

    //Si se elimina un producto se elimina del fichero productos
    if (isset($_GET['eliminar'])) {
        $eliminar = $_GET['eliminar'];

        foreach (file('productos.txt') as $linea) {
            $array = explode(",", trim($linea));

            if ($array[0] == $eliminar) {
                $contenido = file_get_contents('productos.txt');
                $contenido = str_replace($linea, '', $contenido);
                file_put_contents('productos.txt', $contenido);
                echo 'entra aqui';
            }
        }

        header('Location: ./Ejercicio3.php?eliminado=');
    }
    ?>
</body>

</html>
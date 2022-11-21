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
    //Acceso a la BBDD
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    $productos_consulta = $conexion->query("select * from productos");

    // Inicio de sesión
    session_start();

    //Obtiene los valores de los productos de la BBDD
    if (!isset($_SESSION['productos'])) {
        $_SESSION['productos'] = [];

        while ($registro = $productos_consulta->fetchObject()) {
            array_push($_SESSION['productos'], array($registro->nombre, $registro->precio, $registro->imagen, $registro->descripcion));
        }
    }

    if (isset($_GET['accion'])) {
        //Muestra un formulario para añadir nuevos productos
        if ($_GET['accion'] == 'añadir') {
            echo '<form action="Ejercicio3-Validacion.php" method="post" enctype="multipart/form-data">
                <label>Nombre del producto</label>
                <input type="text" name="nombre"><br>
                <label>Precio del producto</label>
                <input type="number" name="precio"><br>
                <label>Introduce la imagen del producto</label>
                <input type="file" name="img"><br>
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

    //Si se añade nuevo producto se guarda en la BBDD 
    if (isset($_POST['nombre'])) {
        $fileName = basename($_FILES['img']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $image = $_FILES['img']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        $conexion ->exec("insert into productos (nombre,precio,imagen,descripcion) values ('".$_POST['nombre']."',".$_POST['precio'].",'".$imgContent."','".$_POST['desc']."')");

        header('Location: ./Ejercicio3.php?productoNuevo=');
    }

    //Si se elimina un producto se elimina de la BBDD
    if (isset($_GET['eliminar'])) {
        $eliminar = $_GET['eliminar'];

        $conexion ->exec("delete from productos where nombre = '".$eliminar."'");

        header('Location: ./Ejercicio3.php?eliminado=');
    }
    ?>
</body>

</html>
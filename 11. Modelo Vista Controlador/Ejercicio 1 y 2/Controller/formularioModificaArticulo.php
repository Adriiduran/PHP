<?php
    require_once '../Model/Articulo.php';
    $codigo = $_GET['codigo'];

    $conexion = BlogDB::connectDB();
    $sql = "SELECT * FROM articulos WHERE codigo=$codigo";
    $consulta = $conexion->query($sql);

    $consulta = $consulta->fetchObject();

    $articulo = new Articulo($consulta->codigo,$consulta->titulo,$consulta->contenido);
    $articulo->setFecha($consulta->fecha);

    $data['articulo'] = $articulo;

    include '../View/formularioModificaArticulo.php';
?>

<?php
include_once "BlogDB.php";

class Articulo
{
    protected $codigo;
    protected $titulo;
    protected $fecha;
    protected $contenido;

    public function __construct($codigo, $titulo, $contenido)
    {
        $this->codigo = $codigo;
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->fecha = null;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function insert()
    {
        $conexion = BlogDB::connectDB();
        $insercion = "INSERT INTO articulos (codigo, titulo, fecha, contenido) VALUES ($this->codigo ,'$this->titulo', '$this->fecha', '$this->contenido')";
        $conexion->exec($insercion);
    }

    public function delete()
    {
        $conexion = BlogDB::connectDB();
        $borrado = "DELETE FROM articulos WHERE codigo='$this->codigo'";
        $conexion->exec($borrado);
    }

    public static function getArticulos()
    {
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM articulos";
        $consulta = $conexion->query($seleccion);
        $articulos = [];

        while ($registro = $consulta->fetchObject()) {
            $articulo = new Articulo($registro->codigo, $registro->titulo, $registro->contenido);
            $articulo->setFecha($registro->fecha);
            $articulos[] = $articulo;
        }

        return $articulos;
    }
}

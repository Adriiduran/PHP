<?php
require_once 'TiendaDB.php';
class Cesta
{
  private $codigo;
  private $nombre;
  private $precio;
  private $cantidad;
  static $cantidadTotal=0;
  static $precioTotal=0;

  function __construct($codigo, $nombre, $precio, $cantidad)
  {
    $this->codigo = $codigo;
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->cantidad = $cantidad;
  }

  public function getCodigo()
  {
    return $this->codigo;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getPrecio()
  {
    return $this->precio;
  }

  public function getCantidad()
  {
    return $this->cantidad;
  }

  static public function getCantidadTotal(){
    return self::$cantidadTotal;
  }
  static public function getPrecioTotal(){
    return self::$precioTotal;
  }

  public function delete()
  {
    $conexion = TiendaDB::connectDB();
    $consultaCesta = $conexion->query("select cantidad from cesta where codigo=\"" . $this->codigo . "\"");
    $num = ($consultaCesta->fetchObject());
    $num = $num->cantidad;

    if ($num > 0) {
      $modificar = "UPDATE cesta set cantidad=cantidad-1 WHERE codigo=\"" . $this->codigo . "\"";
      $num = $num - 1;
      $conexion->exec($modificar);
    }
    if ($num < 1) {
      $modificar = "DELETE from cesta where codigo=\"" . $this->codigo . "\"";
      $conexion->exec($modificar);
    }

    self::$cantidadTotal--;
    
  }

  public function añadir(){
    $conexion = TiendaDB::connectDB();
    $consultaCesta = $conexion->query("select cantidad from cesta where codigo=\"" . $this->codigo . "\"");
    $num = ($consultaCesta->fetchObject());
    $num = $num->cantidad;

    if ($num > 0) {
      $modificar = "UPDATE cesta set cantidad=cantidad+1 WHERE codigo=\"" . $this->codigo . "\"";
      $num = $num + 1;
      $conexion->exec($modificar);
    }
    if ($num < 1) {
      $insercion = "INSERT INTO cesta (codigo, nombre, precio, cantidad) VALUES (\"".$this->codigo."\", \"".$this->nombre."\", \"".$this->precio."\", \"".$this->cantidad."\")";
      $conexion->exec($insercion);
    }
  }

  public function vaciar(){
    $conexion = TiendaDB::connectDB();
    $modificar = "DELETE from cesta";
    $conexion->exec($modificar);
  }

  public function borrarProducto() {
    $conexion = TiendaDB::connectDB();
    $borrado = "DELETE FROM cesta WHERE codigo=\"".$this->codigo."\"";
    $conexion->exec($borrado);
  }


  public static function getProductosCesta()
  {
    $conexion = TiendaDB::connectDB();
    $seleccion = "SELECT codigo, nombre, precio, cantidad FROM cesta";
    $consulta = $conexion->query($seleccion);

    $cesta = [];

    while ($registro = $consulta->fetchObject()) {
      $cesta[] = new Cesta($registro->codigo, $registro->nombre, $registro->precio, $registro->cantidad);
    }

    return $cesta;
  }
}

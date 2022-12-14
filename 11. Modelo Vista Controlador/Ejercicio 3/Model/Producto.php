<?php
require_once 'TiendaDB.php';
class Producto {
    private $codigo;
    private $nombre;
    private $precio;
    private $stock;
    
    function __construct($codigo, $nombre, $precio, $stock) {
      $this->codigo = $codigo;
      $this->nombre = $nombre;
      $this->precio = $precio;
      $this->stock = $stock;
    }
  
    public function getCodigo() {
      return $this->codigo;
    }
  
    public function getNombre() {
      return $this->nombre;
    }
  
    public function getPrecio() {
      return $this->precio;
    }
  
    public function getStock() {
      return $this->stock;
    }  
    
    public function insert() {
      $conexion = TiendaDB::connectDB();
      $insercion = "INSERT INTO productos (nombre, precio, stock) VALUES (\"".$this->nombre."\", \"".$this->precio."\", \"".$this->stock."\")";
      $conexion->exec($insercion);
    }
  
    public function delete() {
      $conexion = TiendaDB::connectDB();
      $borrado = "DELETE FROM productos WHERE codigo=\"".$this->codigo."\"";
      $conexion->exec($borrado);
    }
  
    public function update() {
      $conexion = TiendaDB::connectDB();
      $modificar = "UPDATE productos set nombre=\"".$this->nombre."\", precio=\"".$this->precio."\", stock=\"".$this->stock."\" WHERE codigo=\"".$this->codigo."\"";
      $conexion->exec($modificar);
    }

    public function reponer($stock) {
      $conexion = TiendaDB::connectDB();
      $modificar = "UPDATE productos set stock=stock+$stock WHERE codigo=\"".$this->codigo."\"";
      $conexion->exec($modificar);
    }
    

    public static function getProductos() {
      $conexion = TiendaDB::connectDB();
      $seleccion = "SELECT codigo, nombre, precio, stock FROM productos";
      $consulta = $conexion->query($seleccion);
      
      $productos = [];
      
      while ($registro = $consulta->fetchObject()) {
        $productos[] = new Producto($registro->codigo, $registro->nombre, $registro->precio, $registro->stock);
      }
     
      return $productos;    
    }
    
  }
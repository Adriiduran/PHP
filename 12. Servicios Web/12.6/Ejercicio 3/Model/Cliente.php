<?php
include_once 'ClientesDB.php';

function createToken($length = 15) {
    // Crear una cadena de caracteres válidos para el token
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  
    // Obtener la longitud de la cadena de caracteres
    $charactersLength = strlen($characters);
  
    // Inicializar la variable para almacenar el token
    $token = '';
  
    // Generar el token
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, $charactersLength - 1)];
    }
  
    // Devolver el token generado
    return $token;
  }
  
class Cliente
{
    private $nombre;
    private $token;
    private $peticiones;

    public function __construct($nombre,$token)
    {
        $this->nombre = $nombre;
        $this->token = $token;
        $this->peticiones = 0;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of peticiones
     */
    public function getPeticiones()
    {
        return $this->peticiones;
    }

    /**
     * Set the value of peticiones
     *
     * @return  self
     */
    public function setPeticiones($peticiones)
    {
        $this->peticiones = $peticiones;

        return $this;
    }

    public function insert()
    {
        $conexion = ClientesDB::connectDB();
        $insercion = "INSERT INTO clientes (nombre, token) VALUES ('$this->nombre' ,'$this->token')";
        $conexion->exec($insercion);
    }

    public function asignarToken(){
        $this->token = createToken();
    }

    public static function comprobarLogin($nombre,$token){
        $conexion = ClientesDB::connectDB();
        $sql = "SELECT * FROM clientes where nombre='$nombre' and token='$token'";
        $consulta = $conexion->query($sql);

        if ($consulta->fetchObject() == "") {
            return false;
        }
        else{
            return true;
        }
    }

    public function peticion(){
        $conexion = ClientesDB::connectDB();
        $sql = "SELECT peticiones FROM clientes where token='".$this->getToken()."'";
        $consulta = $conexion->query($sql);
        $peticiones = $consulta->fetchObject();

        $peticionActualizada = $peticiones->peticiones + 1;

        $conexion2 = ClientesDB::connectDB();
        $actualizacion = "UPDATE clientes set peticiones = ".strval($peticionActualizada)." where token='".$this->getToken()."'";
        $conexion2->exec($actualizacion);
    }
}

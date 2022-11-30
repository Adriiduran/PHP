<?php
abstract class Zona
{
    protected $entradasDisponibles;

    /* CONSTRUCTOR */
    public function __construct($entradasDisponibles)
    {
        $this->entradasDisponibles = $entradasDisponibles;
    }

    /* TOSTRING */
    public function __toString()
    {
        return "Entradas Disponibles: $this->entradasDisponibles<br><hr>";
    }


    /* GETTERS AND SETTERS */
    public function getEntradasDisponibles()
    {
        return $this->entradasDisponibles;
    }
    public function setEntradasDisponibles($entradasDisponibles)
    {
        $this->entradasDisponibles = $entradasDisponibles;
    }

    /* COMPROBAR SI HAY ENTRADAS DISPONIBLES */
    public function venderEntradas($numEntradas)
    {
        if ($this->entradasDisponibles < $numEntradas) {
?>
            <script>
                alert("No hay entradas suficientes");
            </script>
<?php
        } else {
            $this->entradasDisponibles -= $numEntradas;
        }
    }
}

class principal extends zona{
    public function __construct(){
        parent::__construct(1000);
    }
    public function __toString() {
       return "ZONA Principal <br>".parent::__toString();
    }
}

class compraVenta extends zona{
    public function __construct(){
        parent::__construct(200);
    }
    public function __toString() {
        return "ZONA Compra-Venta <br>".parent::__toString();
    }
}

class vip extends zona{
    public function __construct(){
        parent::__construct(25);
    }
    public function __toString() {
        return "ZONA Vip <br>".parent::__toString();
    }
}
?>
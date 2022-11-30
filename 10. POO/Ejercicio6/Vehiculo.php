<?php
class Vehiculo
{
    private static $kmTotales = 0;
    private static $vehiculosCreados = 0;

    public static function getVehiculosCreados()
    {
        return Vehiculo::$vehiculosCreados."<br>";
    }

    public static function getKmTotales()
    {
        return Vehiculo::$kmTotales."<br>";
    }

    private $kilometros;
    private $marca;
    private $color;

    public function __construct($kilometros,$marca,$color)
    {
        $this->kilometros = $kilometros;
        $this->marca = $marca;
        $this->color = $color;
        Vehiculo::$kmTotales += $kilometros;
        Vehiculo::$vehiculosCreados++;

    }

    public function getKilometros()
    {
        return $this->kilometros."<br>";
    }
}
?>
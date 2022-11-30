<!-- Ejercicio 10
Queremos modelar una casa con muchas bombillas, de forma que cada bombilla se puede encender o apagar
individualmente. Para ello haremos una clase Bombilla con un atributo privado que almacene si está encendida
o apagada, otro para la potencia consumida y por último otro atributo para la ubicación (salón, cocina, etc…);
realizar un método que nos diga si una bombilla concreta está encendida, así como los getter y setters
necesarios.
Además, queremos poner un interruptor general de la luz, tal que, si saltan los fusibles, todas las bombillas
quedan apagadas. Cuando el fusible se repara, las bombillas vuelven a estar encendidas o apagadas, según
estuvieran antes del percance.
Diseñar una página que genere las bombillas de una casa y las almacene en un array de sesión. Mostrar las
bombillas de manera gráfica (desarrolla tu imaginación) dando la opción de encender y apagar cada una, así
como de encender y apagar el interruptor general. Mostrar en todo momento la potencia consumida por las
bombillas encendidas.
 -->

<?php
class Bombilla{
    private $estado;
    private $potenciaConsumida;
    private $ubicacion;
    private static $interruptorGeneral = true;

    //?CONSTRUCTOR
    public function __construct($ubicacion){
        $this->estado = false;
        $this->potenciaConsumida = 0;
        $this->ubicacion = $ubicacion;
    }

    //?GETTER Y SETTERS
    public function getEstado(){
        return $this->estado;
    }

    public function setEstado(){
        if($this->estado){
            $this->estado = false;
        }
        else{
            $this->estado = true;
            $this->potenciaConsumida += 10;
        }
    }

    public function getPotenciaConsumida(){
        return $this->potenciaConsumida;
    }

    public function getUbicacion(){
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion){
        $this->ubicacion = $ubicacion;
    }

    static public function getInterruptorGeneral(){
        return self::$interruptorGeneral;
    }

    static public function setInterruptorGeneral($estado){
        self::$interruptorGeneral = $estado;
    }

    static public function activarGeneral(){
        if(!self::$interruptorGeneral){
            self::$interruptorGeneral = true;
        }
        else{
            self::$interruptorGeneral = false;
        }
    }
}
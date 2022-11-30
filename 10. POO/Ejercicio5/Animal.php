<?php
class Animal{
    private $sexo;
    private $especie;

    public function __construct($sexo, $especie){
        $this->sexo = $sexo;
        $this->especie = $especie;
    }

    public function __toString(){
        return "Sexo: $this->sexo";
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function duerme(){
        return "Zzzzzzz, soy un animal.<br>";
    }

    public function comer(){
        return "Estoy comiendo, soy un animal.<br>";
    }
}

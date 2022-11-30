<?php
include_once 'Animal.php';
class Ave extends Animal{

    public function __construct($sexo,$especie)
    {
        parent::__construct($sexo,$especie);
    }
    public function duerme()
    {
        return "Estoy durmiendo en el nido<br>" . parent::duerme();
    }
    public function vuela()
    {
        return "Estoy volando<br>";
    }
    public function incuba(){
        return "Estoy incubando";
    }
}
?>

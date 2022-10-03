<?php 
    if (isset($_GET["correcto"])) {

        //se recupera si el usuario ha hecho click en la imagen correcta
        $correcto = $_GET["correcto"];
        
        if ($correcto == 0) {
            header("location:./Ejercicio5-Correcto.php");
        }
        else{
            header("Refresh:1; url=./Ejercicio5.php");
        }
            
    }
?>
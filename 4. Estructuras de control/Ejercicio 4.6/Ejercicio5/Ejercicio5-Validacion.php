<?php 
    if (isset($_GET["correcto"])) {

        $correcto = $_GET["correcto"];

        /*echo $correcto;

        header("Refresh:2; url=./Ejercicio5.php");*/
        
        if ($correcto == 0) {
            header("location:./Ejercicio5-Correcto.php");
        }
        else{
            header("Refresh:1; url=./Ejercicio5.php");
        }
            
    }
?>
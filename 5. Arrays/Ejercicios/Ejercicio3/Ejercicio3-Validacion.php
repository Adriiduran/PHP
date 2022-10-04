<?php 
    if (isset($_GET['usuario'])) {
        $usuario = strtolower($_GET['usuario']);
        $intentos = $_GET['intentos'];

        if ($usuario == "messi") {
            header('location:./Ejercicio3-Correcto.php?intentos='.$intentos.'');
        }
        else{
            header("Refresh:2; url=Ejercicio3.php?intentos=".$intentos."&array=".$_GET['array']."");
            echo '<h1>Lo siento la respuesta no es correcta</h1>';
        }
    }
    else{
        $intentos = $_GET['intentos'] - 1;
        $array = unserialize(base64_decode($_GET['array']));
        $i = $_GET['i'];
        $j = $_GET['j'];

        $array[$i][$j] = 1;
        $cadenaTexto = base64_encode(serialize($array));

        header('Location: ./Ejercicio3.php?array='.$cadenaTexto.'&intentos='.$intentos.'');
    }
?>

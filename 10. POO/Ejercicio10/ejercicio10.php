<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/b31e4c6ba2.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<?php session_start();
include "bombilla.php";
if(isset($_SESSION["bombillas"])){
    Bombilla::setInterruptorGeneral($_SESSION["estadoGeneral"]);
    if(isset($_POST["ubi"])){
        $bombillas = unserialize($_SESSION["bombillas"]);
        $bombillas[] = new Bombilla($_POST["ubi"]); 
        $bombillas = serialize($bombillas);
        $_SESSION["bombillas"] = $bombillas;
        header("Location: ejercicio10.php");
    }

    if(isset($_GET["general"])){
        Bombilla::activarGeneral();
        $_SESSION["estadoGeneral"] = Bombilla::getInterruptorGeneral();
        header("Location: ejercicio10.php");
    }

    if(isset($_GET["activar"])){
        $bombillas = unserialize($_SESSION["bombillas"]);
        $bombillas[$_GET["activar"]]->setEstado();
        $bombillas = serialize($bombillas);
        $_SESSION["bombillas"] = $bombillas;
        header("Location: ejercicio10.php");
    }
} 
else{
    $bombillas = [];
    $bombillas = serialize($bombillas);
    $_SESSION["bombillas"] = $bombillas;
    $_SESSION["estadoGeneral"] = Bombilla::getInterruptorGeneral();
}

$bombillas = unserialize($_SESSION["bombillas"]);
?>
<body>
    <table class="tabla1">
        
        <tr>
            <td class="titulo">
                Luz general --> 
                <?php 
                if(Bombilla::getInterruptorGeneral()){
                    echo "Activada";
                }
                else{
                    echo "Desactivada";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <a href="?general=1">ACTIVAR</a>
            </td>
        </tr>
    </table>

    <section>
        <?php 
        if(!Bombilla::getInterruptorGeneral()){
            echo "<div class='luzGeneral'></div>";
        }
        ?>
    <table>
        <tr>
            <th colspan="5"><h1>Bombillas</h1></th>
        </tr>
        <?php 
        $cont = 0;
        $potenciaTotal = 0;
        $numBombilla = 0;
        foreach ($bombillas as $item) {
            if($cont == 0){
                echo "<tr>";
            }
            $estado = $item->getEstado()?"Encendida":"Apagada";
            $ubicacion = $item->getUbicacion();
            $potencia = $item->getPotenciaConsumida();
            $potenciaTotal += $potencia;
            $estiloBombilla = ($estado == "Encendida")?"encendida":"apagada";
            if(!Bombilla::getInterruptorGeneral()){
                $estiloBombilla = "apagada";
                $estado = "Apagada";
            }
            $cont++;

            echo "<td class='container'><div class='bombilla'>
            <img src='img/bombilla.png' class='$estiloBombilla'>      
            <h3>Estado --> $estado</h3>
            <h3>Ubicación --> $ubicacion</h3>
            <h3>Potencia consumida --> $potencia</h3>
            <a href='?activar=$numBombilla'>ACTIVAR</a>
            </div></td>";

            $numBombilla++;
            if($cont == 5){
                echo "</tr>";
                $cont = 0;
            }
        }
        echo "<tr><th colspan='5'><h2>Consumo total --> $potenciaTotal</h2></th></tr>";
        ?>
    </table>
    </section>



    <form action="#" method="POST">
        <input type="text" name="ubi" placeholder="Ubicación de la bombilla">
        <input type="submit" value="Añadir bombilla">
    </form>
</body>
</html>
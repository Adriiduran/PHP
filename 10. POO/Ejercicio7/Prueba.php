<?php 
    include_once 'DadoPoker.php';

    $dado1 = new DadoPoker();
    $dado2 = new DadoPoker();
    $dado3 = new DadoPoker();
    $dado4 = new DadoPoker();
    $dado5 = new DadoPoker();

    $cubilete = [$dado1,$dado2,$dado3,$dado4,$dado5];

    foreach ($cubilete as $dado) {
        echo $dado -> tira();
    }
?>
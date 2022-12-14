<?php
$cantidadTotal=0;
$precioTotal=0;

$fp = fopen("pedido.txt", "w");

// ESCRIBIMOS LA FACTURA EN EL ARCHIVO
fwrite($fp, "PRODUCTOS:" . PHP_EOL);
foreach ($data['productosCesta'] as $producto) {
  $cantidadTotal+=$producto->getCantidad();
  $precioTotal+=$producto->getPrecio()*$producto->getCantidad();
    fwrite($fp,PHP_EOL."Nombre: ".$producto->getNombre() ." - precio: ".$producto->getPrecio()." - cantidad: ".$producto->getCantidad());
}

fwrite($fp,PHP_EOL. PHP_EOL."CANTIDAD TOTAL DE PRODUCTOS : ".$cantidadTotal);
fwrite($fp,PHP_EOL."PRECIO TOTAL : ".$precioTotal);
fclose($fp);
//Se inicia el escript
<?php
//se declara la funcion calculaDescuento que toma dos parametros, el precio, y el porcentaje de descuento
function calculaDescuento($precio, $porcentajeDescuento) {
//se establece que el descuento es el resultado de multiplical el precio por el porcentaje de descuento, y el resulado se divide entre 100
$descuento = $precio * $porcentajeDescuento / 100;
//el precio final es el precio original restandole el descuento
$precioFinal = $precio - $descuento;
//el valor de retorno es el de la variable $precioFinal
return $precioFinal;
}

//se declara la variable $precioOriginal y se le asigna un valor
$precioOriginal = 100;
//se declara la variable $descuento y se le asigna un valor
$descuento = 15;

//se declara la variable $precioFinal y se le asigna el valor resultante de la funcion calcularDescuento con las variables antes declaradas como parametros
$precioFinal = calculaDescuento($precioOriginal, $descuento);

//Se imprime en pantalla el precio original
echo "El precio original es: " . $precioOriginal . "\n";
// Se imprime en pantalla el descuento
echo "El descuento es: " . $descuento . "%\n";
//Se imprime en pantalla el precio final
echo "El precio final es: " . $precioFinal . "\n";
?>
//Se cierra el script

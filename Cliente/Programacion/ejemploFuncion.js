var resultado;
var numero1 = 3;
var numero2 = 5;
// Se suman los números y se muestra el resultado
resultado = numero1 + numero2;
alert('El resultado es: '+ resultado);


numero1 = 10;
numero2 = 7;
// Se suman los numeros y se muestra el resultado
resultado = numero1 + numero2;
alert('El resultado es: '+ resultado);

numero1 = 5;
numero2 = 8;
// Se restan los numeros y se muestra el resultado
resultado = numero1 - numero2;
alert('El resultado es: '+ resultado);

//Para hacer una funcion reutilizables se haria lo siguiente
function suma_y_muestra(num1, num2){
  var resultado = num1 + num2;
  alert('El resultado es: '+ resultado);
}

//La buena practica es declarar las variables y luego usarlas como los paramtrros en la funcion

numero1 = 3;
numero2 = 5;
suma_y_muestra(numero1, numero2);

numero1 = 10;
numero2 = 7;
suma_y_muestra(numero1, numero2);

numero1 = 5;
numero2 = 8;
suma_y_muestra(numero1, numero2);
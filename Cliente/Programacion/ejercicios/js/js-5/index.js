let num1 = prompt("Introduce un numero")
let num2 = prompt("Introduce otro numero")

num1 = parseInt(num1)
num2 = parseInt(num2)


if(num1 < num2){
  alert(num1 + " no es mayor que  " + num2)
}

if(num2 > 0){
  alert(num2 + " es positivo")
} 

if(num1 < 0 && num1 != 0){
  alert(num1 + " es negativo o distinto de cero")
}

if(num1 + 1 < num2){
  alert("Incrementar en 1 unidad el valor de " + num1 + " no lo hace mayor o igual que " + num2)
}
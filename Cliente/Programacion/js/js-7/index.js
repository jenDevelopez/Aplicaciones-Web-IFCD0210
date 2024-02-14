let price = prompt('Introduce el precio de la entrada');
let quantity = prompt("Cuantas entradas quieres comprar?")

let discount = 0;

quantity = Number(quantity)
price = Number(price)

console.log(typeof quantity, typeof price)

if(price !== Number || quantity !== Number){
  alert('Introduzca una cantidad valida')
}


if(quantity == 1){
  discount = 0
}else if(quantity == 2){
  discount = 10
}else if(quantity == 3){
  discount = 15
}else if(quantity == 4){
  discount = 20
}else if(quantity >= 5){
  discount = 25
}

let totalPrecio = price - ((discount * price) / 100)
document.getElementById('totalPrecio').innerHTML = totalPrecio



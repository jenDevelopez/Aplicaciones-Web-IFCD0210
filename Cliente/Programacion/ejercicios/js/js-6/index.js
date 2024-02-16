let puntuacion = prompt("Introduce tu puntuacion")
puntuacion = parseInt(puntuacion)

let parrafo = document.getElementById('parrafo')
let letra = document.getElementById('letra')
let nota = ""

if(nota == 0 || nota <= 8){
  nota = "E"
  parrafo.innerHTML = puntuacion
  letra.innerHTML = nota
}else if(nota >= 9 && nota <= 11){
  nota = "D"
  parrafo.innerHTML = puntuacion
  letra.innerHTML = nota
}else if(nota >= 12 && nota <= 15){
  nota = "C"
  parrafo.innerHTML = puntuacion
  letra.innerHTML = nota
}else if(nota >= 16 && nota <= 18){
  nota = "B"
  parrafo.innerHTML = puntuacion
  letra.innerHTML = nota
}else if(nota >= 19 && nota <= 20){
  nota = "A"
  parrafo.innerHTML = puntuacion
  letra.innerHTML = nota
}else if(nota > 20 || nota < 0){
  alert("Introduce una nota valida")
}









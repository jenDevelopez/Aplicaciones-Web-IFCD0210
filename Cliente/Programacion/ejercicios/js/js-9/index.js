
function calcularMayor(e) {
  e.preventDefault()
  const num1 = Number(document.getElementById('num1').value)
  const num2 = Number(document.getElementById('num2').value)

  if(num1 > num2){
    document.getElementById('respuesta').innerHTML = num1 + " es mayor que " + num2
  }else{
    document.getElementById('respuesta').innerHTML = num2 + " es mayor que " + num1
  }

  let suma = num1 + num2
  document.getElementById('suma').innerHTML = "El resultado de la suma de" + num1 + " y " + " " + num2 + " es igual a " + " " + suma
}

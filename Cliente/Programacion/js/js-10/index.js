function calcularFactorial () {
  const numero = Number(document.getElementById('numero').value)

  let factorial = numero;

  for (let i = numero -1 ; i > 0; i--) {
    factorial *= i
    console.log(factorial)
    
  }

  document.getElementById('solucion').innerHTML = "El factorial de " + numero + " es " + factorial

}
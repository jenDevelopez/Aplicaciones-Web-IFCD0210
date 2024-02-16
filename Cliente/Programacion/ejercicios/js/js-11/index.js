function ordenarNumeros() {
  
  const num1 = Number(document.getElementById('num1').value);
  const num2 = Number(document.getElementById('num2').value);
  const num3 = Number(document.getElementById('num3').value);
  const num4 = Number(document.getElementById('num4').value);

  let mayor = num1;
  let menor = num1;

  const numeros = [num1,num2,num3,num4]

  for(let i = 0; i < numeros.length; i++){
   if(numeros[i] > mayor){
    mayor = numeros[i]
   }else{
    menor = numeros[i]
   }

  }

  document.getElementById('mayor').innerHTML = mayor
  document.getElementById('menor').innerHTML = menor





}

function numerosEnOrden(numeros){
  let arrayNumeros = numeros
  let mayor = arrayNumeros[0];
  let menor = arrayNumeros[0];
 
  for(let i = 0; i < arrayNumeros.length; i++){
    if(numeros[i] > mayor){
      mayor = numeros[i]
    }else {
      menor = numeros[i]
    }
  }

  return [mayor,menor]
}

function crearInputs() {
  const quantityNumbers = Number(document.getElementById('quantityNumbers').value);
  

  const inputContainer = document.getElementById('inputContainer')
  
  for(let i = 0; i < quantityNumbers; i++){
    let input = document.createElement('input') 
    input.placeholder = 'Ingrese un numero'
    input.id = 'input' + (i+1)
    inputContainer.appendChild(input)
  
  }

  let button = document.createElement('button')
    button.innerHTML = 'Ordenar'
    button.id = 'button'
    inputContainer.appendChild(button)

    button.addEventListener('click', () => {
      
      let numbers = Array.from(document.querySelectorAll('input')).map(input => Number(input.value));
      let newNumbers = numbers.slice(1,numbers.length)
      let nuevoArrayNumeros = numerosEnOrden(newNumbers)
     
      let mayor = document.createElement('p');
    mayor.innerHTML = "El numero mayor es " + nuevoArrayNumeros[0];
    let menor = document.createElement('p');
    menor.innerHTML = "El numero menor es " + nuevoArrayNumeros[nuevoArrayNumeros.length -1];
    inputContainer.appendChild(mayor);
    inputContainer.appendChild(menor);
    })
}
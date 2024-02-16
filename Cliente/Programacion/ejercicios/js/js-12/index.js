function verMeses(){
  const meses = ['Enero','Febrero', 'Marzo', 'Abril','Mayo','Junio', 'Julio', 'Agosto','Septiembre','Octubre','Noviembre','Diciembre']
  
  let div = document.getElementById('meses')
  let ul = document.createElement('ul')
  div.appendChild(ul)
  
  for(mes in meses){
    let li = document.createElement('li')
    li.innerHTML = meses[mes]
    ul.appendChild(li)
  }
  
  
}

function convertirALetras(){
  let frase = document.getElementById('frase').value
  
  let ul = document.querySelector('ul')
  for(letra of frase){
    let li = document.createElement('li')
    li.innerHTML = letra 
    ul.appendChild(li)
  }

}
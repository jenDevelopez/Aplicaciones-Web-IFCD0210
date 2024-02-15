const bebidas = [
  "Café con leche",
  "Té verde con miel",
  "Chocolate caliente a la taza",
  "Mate cocido",
  "Infusion de manzanilla",
  "Chai latte",
  "Té de jengibre y limón",
  "Café americano",
  "Capuchino",
  "Té negro con leche",
  "Agua mineral con gas",
  "Limonada",
  "Zumo de naranja natural",
  "Smoothie de frutas tropicales",
  "Granizado de café",
  "Cerveza fría",
  "Refresco de cola",
  "Té helado",
  "Agua de coco",
  "Batido de chocolate",
  "Sangría",
  "Cóctel Margarita",
  "Mojito"
]
function listarBebidas(listaBebidas) {
  const listado = document.querySelector('.listado')
  const ol = document.querySelector('ol')
  if(ol === null){
    const ol = document.createElement("ol");
    listado.appendChild(ol)
    const li = document.createElement("li");
    document.querySelector('#cartaBtn').innerText = "Esconder carta"

    for (let i = 0; i < bebidas.length; i++) {
     const clonedLi = li.cloneNode(true);
     clonedLi.innerHTML = listaBebidas[i];
     ol.appendChild(clonedLi);
   }
  }else{
    listado.removeChild(ol)
    document.querySelector('#cartaBtn').innerText = "Ver carta"

  }

}
const verCarta = () => listarBebidas(bebidas)

function limpiarCarta() {
  const ol = document.querySelector('ol')
  if(ol !== null){
    document.querySelector('.listado').removeChild(ol)
  }
}

function generarBebida() {
  const opcion = Number(document.getElementById("opcion").value)
  for (let i = 0; i < bebidas.length; i++) {
    if (i === opcion - 1) {
      document.getElementById('dialogo').innerHTML = "Tu bebida es " + bebidas[i];
    }
  }
}


function generarNuevaLista(){
  const regex = /^[a-zA-Z]+$/g;
  const nuevalista = bebidas
  const nuevabebida = document.getElementById("nuevaBebida").value
  if(!nuevabebida.match(regex)){
    alert("Ingresa una bebida valida")
    return
  }
  const findIndexElement = nuevalista.findIndex(element => element.toLowerCase() === nuevabebida.toLowerCase())
  if(findIndexElement !== -1){
    alert("La bebida ya existe")
    return
  }else{
    nuevalista.push(nuevabebida)
  }
  
  limpiarCarta()
  listarBebidas(nuevalista)

}
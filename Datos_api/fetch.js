// Función asincrónica que hace una petición a una API
async function traerDatos() {
  // Hace la petición a la API
  const res = await fetch('https://jsonplaceholder.typicode.com/todos?limit=50')
  // Convierte la respuesta a formato JSON
  const data = await res.json()
  // Devuelve los datos obtenidos
  return data
}

// Añade un evento al DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
  // Llama a la función traerDatos y espera a que se resuelva la promesa
  traerDatos().then((data) => {
    // Crea un elemento li
    const li = document.createElement('li')
    // Recorre cada elemento de data
    data.forEach((dato) => {
      // Establece el texto del elemento li con el título del dato
      li.textContent = dato.title
      // Añade el elemento li al elemento con id 'lista'
      document.getElementById('lista').appendChild(li)
    })
  })
})
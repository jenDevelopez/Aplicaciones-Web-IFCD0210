async function traerDatos(){
  const res  = await fetch('https://jsonplaceholder.typicode.com/todos?limit=50')
  const data = await res.json()

  return data
}

document.addEventListener('DOMContentLoaded',() => {
  traerDatos().then((data) => {
    const li = document.createElement
    data.map((dato) => {
      document.getElementById('lista').innerHTML += `<li>${dato.title}</li>`      
    } )
  })
})



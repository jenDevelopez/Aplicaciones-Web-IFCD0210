

 async function traerDatos(){
   //hago la peticion
   const res  = await fetch('https://jsonplaceholder.typicode.com/todos')
     // Convierte la respuesta a formato JSON
   const data = await res.json()
 // Devuelve los datos obtenidos
   return data
 }
 // Añade un evento al DOMContentLoaded
 document.addEventListener('DOMContentLoaded',() => {
     // Llama a la función traerDatos y espera a que se resuelva la promesa
     traerDatos().then((data) => {
    
       //itera cada uno de los objetos de la lista y obtendo los datos
     data.map((dato) => {
      //muestro los datos en un li que esta dentro del ul
       document.getElementById('lista').innerHTML += `<li><span>${dato.id}</span> ${dato.title}</li>`      
     } )
   })
 })



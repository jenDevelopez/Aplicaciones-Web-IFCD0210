function handleSubmitForm(e) {
  e.preventDefault();


  //Selecciono el Pup Up
  let error = document.querySelector('#error')
  let mensaje = ""

  //Validacion del formulario
  // nombre
  const nombre = document.getElementById('nombre').value
  if (nombre.length < 3) {
    mensaje = 'Escribe un nombre válido'
  } 

  // apellido
  const apellido1 = document.getElementById('apellido-1').value
  const apellido2 = document.getElementById('apellido-2').value
  if (apellido1 < 3 || apellido2 < 3) {
    mensaje = 'Escribe un apellido válido'
  } 

  // telefono
  const telefono = Number(document.getElementById('telefono').value)
  if (typeof telefono === "number") {
    if (telefono !== 0 && telefono.length < 9 || telefono !== 0 && telefono[0] !== 6 || telefono !== 0 && telefono[0] !== 7) {
      mensaje = 'Escribe un teléfono válido'
    } 
  }

  // email
  const email = document.getElementById('email').value
  if ((email.length > 0 && email.split('').indexOf('@') || (email.length > 0 && email.split('').indexOf('.'))) === -1) {
    mensaje = 'Escribe un email válido'
  } 
  // fecha de nacimiento
  const fechaNacimiento = document.getElementById('fecha-nacimiento').value
  if (fechaNacimiento.length > 0 && fechaNacimiento.length !== 10) {
    mensaje = "La fecha de nacimiento no es válida"
  } 

  // Turnos
  const turnoSeleccionado = document.querySelector('input[name="turno"]:checked')

  // Lenguajes
  let lenguajeSeleccionado = ""
  const lenguaje = document.getElementById('lenguaje').value
  if (lenguaje === "") {
    lenguajeSeleccionado = "Ningun lenguaje seleccionado"
  } else {
    lenguajeSeleccionado = 'Lenguaje: ' + lenguaje
  }



  //Privacidad
  const privacidad = document.getElementById('privacidad').checked
  if (!privacidad) {
    mensaje = "Debe aceptar las políticas de privacidad"
  }




  document.querySelector('.mensaje').innerHTML = mensaje

  if (mensaje.length > 0) {
    error.classList.remove('hidden')
  }else{
    let div = document.getElementById('confirmacion')
 
    const form = document.querySelector('form');
    const formData = new FormData(form);
    
    for (const element of formData.entries()) {
      const p = document.createElement('p');
      if(element[0] === 'turno'){
        p.textContent = `${element[0]}: ${turnoSeleccionado}`
      }else if(element[0] === 'lenguaje'){
        p.textContent = `${element[0]}: ${lenguajeSeleccionado}`
      }else{
        p.textContent = `${element[0]}: ${element[1]}`
      }
     
      div.appendChild(p);
    }
  }
  console.log(document.querySelectorAll('#confirmacion > p').length)
  let btnInfo = document.getElementById('btnInfo')
  if(document.querySelectorAll('#confirmacion > p').length > 0){
    document.getElementById('confirmacion').classList.remove('hidden')
    btnInfo.addEventListener('click',() => {
      document.querySelector('#confirmacion').classList.add('hidden')
    })
  }
 

}




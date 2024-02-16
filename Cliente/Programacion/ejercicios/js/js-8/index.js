function verificarDni(e) {
  e.preventDefault()
  const numDni = Number(document.getElementById('numDni').value)
  const letraDni = document.getElementById('letraDni').value
  console.log(letraDni.length)

  const letrasDni = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H',
    'L', 'C', 'K', 'E', 'T'
  ];
  if (numDni <= 0 && numDni >= 99999999) {
    document.getElementById('error').innerHTML = "Indica un numero válido de DNI"
  } else if (letraDni.length > 1 || letraDni === "") {
    document.getElementById('error').innerHTML = "Indica una letra de DNI válida"
  } else {
    const letraDniCorrespondiente = Number(numDni) % 23

    if (letraDni.toUpperCase() === letrasDni[letraDniCorrespondiente]) {
      document.getElementById('respuesta').innerHTML = "Tu Dni es correcto, tu dni es: " + numDni + letraDni.toUpperCase()
    } else {
      document.getElementById('respuesta').innerHTML = "Tu Dni es incorrecto, la letra de dni que te corresponde es: " + letrasDni[letraDniCorrespondiente]
    }
  }
}
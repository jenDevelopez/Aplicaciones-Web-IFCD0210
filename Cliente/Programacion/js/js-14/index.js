function comprobarTipoFrase(frase){
  if(frase === frase.toUpperCase()){
    return "La frase es mayúscula"
  }else if(frase === frase.toLowerCase()){
    return "La frase es minúscula"
  }else{
    return "La frase tiene mayúsculas y minúsculas"
  }
}

function verInformacion(){
  const frase = document.getElementById('frase').value;
  const solucion = comprobarTipoFrase(frase)
  document.getElementById('solucion').innerHTML = "La frase " + frase + " es " + solucion;
}
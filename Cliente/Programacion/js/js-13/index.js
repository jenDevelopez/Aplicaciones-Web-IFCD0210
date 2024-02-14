function parOImpar(num){
    return num % 2 == 0 ? "Par" : "Impar";
}

function saberPar(){
    let numero = Number(document.getElementById('numero').value)
    document.getElementById("resultado").innerHTML = "Tu numero es: " + parOImpar(numero);
}

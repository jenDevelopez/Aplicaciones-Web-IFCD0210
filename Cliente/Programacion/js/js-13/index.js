function parOImpar(num){
    if(typeof num !== 'number'){
        return "Ingrese un numero valido"
    }
    
   return num % 2 == 0 ? "El numero es par" : "El numero es impar";
}

function saberPar(){
    let numero = Number(document.getElementById('numero').value)
    
    if(isNaN(numero)){
        alert("Ingrese un numero valido")
    }else{

        document.getElementById("resultado").innerHTML =  parOImpar(numero);
    }

}

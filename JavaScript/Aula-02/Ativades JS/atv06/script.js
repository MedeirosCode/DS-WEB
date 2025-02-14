function alertaDeClique(){
    var numero = document.getElementById("numero").value;
    var resultado = document.getElementById("resultado");

    numero = Number.parseInt(numero);

if (numero > 18){
    resultado.innerHTML = "Você é maior de idade";
}
else{
    resultado.innerHTML = "Você é menor de idade";
}
}
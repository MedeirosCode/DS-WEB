function alertaDeClique(){
    var numero = document.getElementById("numero").value;
    var resultado = document.getElementById("resultado");

    numero = Number.parseInt(numero);

if (numero < 0){
    resultado.innerHTML = "seu numero é negativo";
}
if(numero > 0){
    resultado.innerHTML = "Seu número é positivo";
}
if(numero === 0){
    resultado.innerHTML = "Seu numero é igual a zero";
}
}
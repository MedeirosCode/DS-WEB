

function alertaDeClique(){
    var numero = document.getElementById("number").value;
    var resultado = document.getElementById("resultado");
    


if (numero % 2 === 0){
    resultado.innerHTML = " o numero " + numero + " é par ";
}
    else{
    resultado.innerHTML = " o numero  " + numero + " é impar ";

}
}